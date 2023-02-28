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


    Router::post('/connect-contact-client/{clientId}/{contactId}', 'ContactClientsController@connect')->setName('connect.client-to-contact');
    Router::get('/connected-clients-for-contact/{contactId}', 'ContactClientsController@connectedClientsForContacts')->setName('connected.clients');
    Router::get('/connected-contacts-for-client/{clientId}', 'ContactClientsController@connectedContactsForClients')->setName('connected.contacts');
    Router::post('/separate-contact-and-client', 'ContactClientsController@separateContactAndClient')->setName('separate.contact-client');
});
