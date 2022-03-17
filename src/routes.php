<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/registrar', 'HomeController@registrar');
$router->get('/esqueceu', 'HomeController@esqueceu');
$router->post('/fazLogin', 'AppController@login');
$router->get('/usuario', 'AppController@index');
