<?php

namespace App\Controllers;

abstract class BaseController
{

    // render view for the name and pass some variables
    public function view($resourceName, $vars = [])
    {

        foreach ($vars as $key => $value) {
            
            $$key = $value;
        }

        return require(__DIR__ . "/../../views/" . $resourceName . ".php");
    }

}
