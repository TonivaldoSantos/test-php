<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function registrar() {
        $this->render('registro');
    }

    public function esqueceu() {
        $this->render('esqueceu');
    }

    public function registrarAction() {
      $nome = addslashes($_POST['registerName']);
      $email = addslashes($_POST['registerEmail']);
      $senha1 = addslashes($_POST['password1']);
      $senha2 = addslashes($_POST['password2']);
    if( $senha1 === $senha2){
        $usuario = Usuario::insert([
            'nome'=> $nome, 
            'email'=>$email,
            'senha' =>md5($senha1)
        ])
            ->execute();
            $usuario = Usuario::select()->where(['senha'=> md5($senha1), 'nome'=>$nome])->execute(); 
              if(count($usuario) > 0){
                $_SESSION['logado'] = $usuario[0]['nome'];
                $this->redirect('/usuario');
              }else{
                $this->redirect('/registrar');

              }         
    }else{
       
        $this->redirect('/registro');

    }
    }
}