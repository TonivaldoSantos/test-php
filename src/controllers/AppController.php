<?php

namespace src\controllers;



use \core\Controller;
use \src\models\Usuario;
use \src\models\Aluno;


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
      $alunos = Aluno::select()->execute(); 
        $this->render('usuario', [
          'nome' => $_SESSION['logado'],
          'alunos' => $alunos
        ]);


    }else{
        $this->redirect('/');
    }
    }

    public function add() {
      if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
          $this->render('aluno-add', ['nome' => $_SESSION['logado']]);
      }else{
          $this->redirect('/');
      }
      }

      public function addAction() {
        if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
          $nome = addslashes($_POST['alunoName']);
          $serie = addslashes($_POST['alunoSerie']);
          $nota1 = addslashes($_POST['nota1']);
          $nota2 = addslashes($_POST['nota2']);
              if(isset( $nome) && !empty( $nome) && isset($serie) && !empty($serie)){
              $aluno = Aluno::insert([
                'nome'=> $nome, 
                'serie'=>$serie,
                'nota1' =>$nota1,
                'nota2' => $nota2])->execute();     
                  $_SESSION['alunoinserido'] = "Aluno inserido com sucesso";
                  $this->redirect('/usuario');
        }else{
          $_SESSION['alunoerro'] = "Aluno não inserido";
          $this->redirect('/usuario');
        }
        }

}

public function atualiza($id) {
  if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
      $aluno = Aluno::select()->where(['id_aluno'=> $id])->execute(); 
      if(count($aluno) > 0){
      $this->render('aluno-atualiza', [
        'id' => $aluno[0]['id_aluno'],
        'nome'=> $aluno[0]['nome'],
        'serie' =>$aluno[0]['serie'],
        'nota1' => $aluno[0]['nota1'],
        'nota2' => $aluno[0]['nota2']
      ]);
  }else{
      $this->redirect('/usuario');
  }

}else{
  $this->redirect('/');
}
}

public function atualizaAction(){
  if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
    $nome = addslashes($_POST['alunoName']);
    $serie = addslashes($_POST['alunoSerie']);
    $nota1 = addslashes($_POST['nota1']);
    $nota2 = addslashes($_POST['nota2']);
    $id = addslashes($_POST['id']);
  
        if(isset( $nome) && !empty( $nome) && isset($serie) && !empty($serie)){
          
          Aluno::update()
          ->set('nome', $nome)
          ->set('serie', $serie)
          ->set('nota1', $nota1)
          ->set('nota2', $nota2)
          ->where('id_aluno', $id)
          ->execute();
          $_SESSION['teste']='estou aqui2';
          $this->redirect('/usuario');
        
}else{
  
  $this->redirect('/usuario');
}


}else{
  $this->redirect('/');
}
}

public function deletaAction($id){
  if( isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
    Aluno::delete()->where('id_aluno', $id)->execute();
    $this->redirect('/usuario');
  }else{
    $this->redirect('/');
  }

}
}