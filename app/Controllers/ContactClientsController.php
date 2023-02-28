<?php

namespace App\Controllers;

use App\DB;
use App\Models\Client;
use App\Models\Contact;
use App\Models\ContactClient;

class ContactClientsController extends BaseController
{


    public function connect(int $clientId, int $contactId)
    {

        $client = Client::find($clientId);
        $contact = Contact::find($contactId);

        if (is_null($client)) {

            return $this->json([
                "message" => "Client not found",
            ], 404);
        }

        if (is_null($contact)) {

            return $this->json([
                "message" => "Contact not found",
            ], 404);
        }

        $connectionExists = DB::make()
            ->query("SELECT * FROM contact_clients WHERE client_id = '{$client->id}' AND contact_id = '{$contact->id}' limit 1")->num_rows > 0;

        if ($connectionExists) {

            return $this->json([
                "message" => "Contact is already connected to the client",
            ]);
        }

        ContactClient::create([
            "client_id" => $client->id,
            "contact_id" => $contact->id,
        ]);

        return $this->json([
            "message" => "Contact is successfully attached to client",
        ]);
    }


    public function connectedContactsForClients(int $clientId)
    {

        $result = DB::make()
            ->query("SELECT * FROM contacts AS a INNER JOIN contact_clients AS b ON a.id = b.contact_id WHERE b.client_id = '$clientId'");

        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $this->json($rows);
    }

    public function connectedClientsForContacts(int $contactId)
    {

        $result = DB::make()
            ->query("SELECT * FROM clients AS a INNER JOIN contact_clients AS b ON a.id = b.client_id WHERE b.contact_id = '$contactId'");

        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $this->json($rows);
    }


    public function separateContactAndClient()
    {

        $client = Client::find(input("clientId"));
        $contact = Contact::find(input("contactId"));

        if (is_null($client)) {

            return $this->json([
                "message" => "Client not found",
            ], 404);
        }

        if (is_null($contact)) {

            return $this->json([
                "message" => "Contact not found",
            ], 404);
        }

        $connectionExists = DB::make()
            ->query("SELECT * FROM contact_clients WHERE client_id = '{$client->id}' AND contact_id = '{$contact->id}' limit 1")->num_rows > 0;

        if (!$connectionExists) {

            return $this->json([
                "message" => "Contact and Client are not connected together",
            ]);
        }


        $result = DB::make()
            ->query("DELETE FROM  contact_clients WHERE client_id = '{$client->id}' AND contact_id = '{$contact->id}' ");

        if ($result === TRUE) {

            return $this->json([
                "message" => "Contact has been separated from client",
            ]);
        }

        return $this->json([
            "message" => "An error occured",
        ], 500);
    }
}
