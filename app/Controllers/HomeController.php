<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Contact;

class HomeController extends BaseController
{

    public function index()
    {

        $clients =  Client::all();
        $contacts = Contact::all();

        return $this->view("home", compact("clients", "contacts"));
    }
}
