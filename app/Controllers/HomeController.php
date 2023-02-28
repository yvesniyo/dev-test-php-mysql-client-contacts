<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Contact;

class HomeController extends BaseController
{

    public function index()
    {

        return $this->view("home-page");
    }
}
