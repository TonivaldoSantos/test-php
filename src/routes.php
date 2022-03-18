<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/registrar', 'HomeController@registrar');
$router->post('/registrar', 'HomeController@registrarAction');
$router->get('/esqueceu', 'HomeController@esqueceu');
$router->post('/fazLogin', 'AppController@login');
$router->get('/usuario', 'AppController@index');
$router->get('/aluno/add', 'AppController@add');
$router->post('/aluno/add', 'AppController@addAction');
$router->get('/aluno/{id}/atualiza', 'AppController@atualiza');
$router->post('/aluno/{id}/atualiza', 'AppController@atualizaAction');
$router->get('/aluno/{id}/deleta', 'AppController@deletaAction');




