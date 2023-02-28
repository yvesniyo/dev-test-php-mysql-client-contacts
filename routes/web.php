<?php

/**
 * This file contains all the routes for the project
 */

use App\Router;

Router::group(['namespace' => '\App\Controllers'], function () {

    Router::get('/', 'HomeController@index')->setName('home');

    Router::get('/clients', 'ClientsController@index')->setName('list.clients');
    Router::post('/clients', 'ClientsController@create')->setName('create.clients');
    Router::get('/clients/{id}', 'ClientsController@details')->setName('create.clients');

    Router::get('/contacts', 'ContactsController@index')->setName('list.contacts');
    Router::post('/contacts', 'ContactsController@create')->setName('create.contacts');
});
