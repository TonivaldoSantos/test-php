<!-- ===============Template para criação de conta =============== -->



<!-- ===============Chama o header=============== -->
<?php $render('header'); ?>
<!-- ============================================ -->



<div class="wrapper container-fluid" style="width: 100% !important;">  <!-- ===============inicia container =============== -->

    <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> 
    </div>

    <div class="text-center mt-4 mb-4 name"> Seja Bem vindo(a): <?php echo $nome; ?> </div>

    <?php if(isset($_SESSION['teste']) && !empty($_SESSION['teste'])) :?>
      <div class="alert alert-success alert-dismissible fade show">
        Atualização realizada com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['teste']); endif ?>

    <?php if(isset($_SESSION['alunoinserido']) && !empty($_SESSION['alunoinserido'])) :?>
      <div class="alert alert-success alert-dismissible fade show">
        Aluno inserido com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['alunoinserido']); endif ?> 

    <?php if(isset($_SESSION['alunoerro']) && !empty($_SESSION['alunoerro'])) :?>
      <div class="alert alert-warning alert-dismissible fade show">
        Aluno não inserido.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['alunoerro']); endif ?> 

    <hr>
<div class="mb-3">
  <a href="<?php echo $base;?>/aluno/add" class="btn-outline fs--3 text-white bg-warning p-2 rounded-pill my=1">Adicionar novo aluno</a> 
</div>
<!-- ------------------------table de exibição de alunos------------------------- -->

    <table class="table table-striped table-sm table-bordered"> 
      <thead class="border-top border-2 border-warning">
        <tr class="bg-primary text-center text-white border-1 align-middle">
        
                  <th scope="col">Nome</th>
                  <th scope="col">Série</th>
                  <th scope="col">Nota 1</th>
                  <th scope="col">Nota 2</th>
                  <th scope="col">Aprovado</th>
                  <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody class="border-2">

<!-- ------------------------Loop para inserção dos dados------------------------- -->
      <?php foreach($alunos as $aluno) :?>
        <tr class="text-center align-middle">
          <td><?php echo $aluno['nome']; ?></td>
          <td><?php echo $aluno['serie']; ?></td>
          <td><?php echo $aluno['nota1']; ?></td>
          <td><?php echo $aluno['nota2']; ?></td>
          <?php $media = ($aluno['nota1'] + $aluno['nota2'])/2;          
          if($media >= 6) :?>
            <td>Sim</td>
          <?php endif?>

          <?php if($media < 6):?>
            <td>Não</td>
          <?php endif?>
          <td>
            <a href="<?php echo $base;?>/aluno/<?php echo $aluno['id_aluno']; ?>/atualiza" class="text-black fs-6"><span class="fas fa-user-edit me-3"></span></a>
            <a href="<?php echo $base;?>/aluno/<?php echo $aluno['id_aluno']; ?>/deleta"class="text-black fs-6"><span class="fas fa-trash" onclick="return confirm('Deseja realmente excluir este aluno?');"></span></a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>  <!-- ===============Encerra container =============== -->



<!-- ===============Chama o footer=============== -->
<?php $render('footer'); ?>
<!-- ============================================ -->

