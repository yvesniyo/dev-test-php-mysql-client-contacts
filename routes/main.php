<?php

/**
 * This file contains all the routes for the project
 */

use App\Router;

Router::group(['namespace' => '\App\Controllers'], function () {

    Router::get('/', 'HomeController@index')->setName('home');

    Router::get('/clients', 'ClientsController@index')->setName('list.clients');

    Router::get('/contacts', 'ContactController@index')->setName('list.contacts');
});
