<?php

namespace App\Controllers;

use App\DB;
use App\Models\Client;

class ClientsController extends BaseController
{

    public function index()
    {
        $data =  Client::allWithContactsSum();


        return $this->json($data);
    }


    public function create()
    {

        $name = trim(input("name"));
        if (empty($name)) {

            return $this->json([
                "message" => "Name should not be empty",
            ], 422);
        }


        $clientCode = $this->generateClientCode($name);

        while (
            DB::make()
            ->query("SELECT * FROM clients where client_code = '$clientCode' limit 1")
            ->num_rows > 0
        ) {
            $clientCode = $this->generateClientCode($name);
        }

        $client = Client::create([
            "name" => $name,
            "client_code" => $clientCode,
        ]);

        return $this->json([
            "message" => "Client created successfully",
            "client" => $client
        ]);
    }


    public function details(int $id)
    {

        $client = Client::find($id);


        return $this->json($client->toArray());
    }


    private function generateClientCode(string $name): string
    {

        $names = explode(" ", $name);
        $clientCode = "";

        // generate the first 3 charactars of client code
        if (count($names)  == 3) {

            $clientCode = $names[0][0] . $names[1][0] . $names[2][0];
        } else if (count($names)  == 2) {

            $clientCode = $names[0][0] . $names[1][0];
            $clientCode .= randomString(1);
        } else if (count($names) == 1) {

            $nameLength = strlen($name);
            if ($nameLength >= 3) {

                $clientCode = substr($name, 0, 3);
            } else {

                $remainingChars = 3 - $nameLength;
                $clientCode = substr($name, 0, $nameLength);
                $clientCode .=  randomString($remainingChars);
            }
        }
        // convert the client code to upper case
        $clientCode = strtoupper($clientCode);

        // get the last client_codes that has the same prefix
        $result = DB::make()
            ->query("SELECT client_code FROM clients WHERE client_code LIKE '$clientCode%' ORDER BY client_code DESC limit 1 ");
        if ($result->num_rows > 0) {

            $lastClientCode = $result->fetch_assoc();
            $numberInCode = (int) substr($lastClientCode["client_code"], 3);
            $nextNumberInCode = (string) $numberInCode + 1;

            $clientCode = $clientCode . str_pad($nextNumberInCode, (4 - strlen($nextNumberInCode)), "0", STR_PAD_LEFT);
        } else {

            $clientCode = $clientCode . "001";
        }


        return $clientCode;
    }
}
