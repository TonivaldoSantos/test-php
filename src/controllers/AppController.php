<?php

namespace src\controllers;



use \core\Controller;
use \src\models\Usuario;


class AppController extends Controller {

    public function login() {
    $nome = addslashes($_POST['userName']);
    $senha = md5(addslashes($_POST['password']));
        if(isset( $nome) && !empty( $nome) && isset($senha) && !empty($senha)){
        $usuario = Usuario::select()->where(['senha'=> $senha, 'nome'=>$nome])->execute(); 
        
          if(count($usuario) > 0){
              
            $_SESSION['logado'] = $usuario[0]['nome'];
            $this->redirect('/usuario');
          }         
    } 
    echo "entrou no else";
    $_SESSION['erroLogin'] = 'Dados inválidos';
      $this->redirect('/'); 
}

    public function index() {
    if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
        $this->render('usuario', ['nome' => $_SESSION['logado']]);
    }else{
        $this->redirect('/');
    }
    }

}