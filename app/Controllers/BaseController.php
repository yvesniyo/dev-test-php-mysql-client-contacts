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

        require(__DIR__ . "/../../views/" . $resourceName . ".php");
    }


    public function json(array $data, int $statusCode = 200)
    {

        header("Content-Type:application/json");

        http_response_code($statusCode);

        return json_encode($data);
    }
}
