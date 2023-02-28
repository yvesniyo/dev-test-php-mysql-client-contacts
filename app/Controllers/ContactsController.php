<?php

namespace App\Controllers;

use App\DB;
use App\Models\Contact;

class ContactsController extends BaseController
{

    public function index()
    {
        $data = Contact::allWithClientsSum();

        return $this->json($data);
    }


    public function create()
    {

        $name = trim(input("name"));
        $surname = trim(input("surname"));
        $email =  trim(input("email"));

        $emailExists = DB::make()->query("SELECT * FROM contacts WHERE  email = '$email' LIMIT 1")->num_rows > 0;
        if ($emailExists) {

            return $this->json([
                "message" => "Email already exists",
            ], 422);
        }

        $contact = Contact::create([
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
        ]);

        return $this->json([
            "message" => "Contact added successfully",
            "data" => $contact
        ]);
    }
}
