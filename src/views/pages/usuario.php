<!-- ===============Template para criação de conta =============== -->



<!-- ===============Chama o header=============== -->
<?php $render('header'); ?>
<!-- ============================================ -->



<div class="wrapper">  <!-- ===============inicia container do formulário de registro=============== -->

    <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> 
    </div>

    <div class="text-center mt-4 name"> Seja Bem vindo(a): <?php echo $nome; ?> </div>

    <div class="text-center text-primary fs-6"> <small>Preencha as informações abaixo e clique em Criar conta para ter acesso à plataforma</small>
    </div>

    <form class="p-3 mt-3" method="POST" action="#">
        <div class="form-field d-flex align-items-center"> 
          <span class="far fa-user"></span><input type="text" name="registerName" id="registerName" placeholder="Seu nome" required> 
        </div>
        <div class="form-field d-flex align-items-center"><span class="fas fa-at">
          </span> <input type="email" name="registerEmail" id="registerEmail" placeholder="Seu melhor email" required> 
        </div>
        <div class="form-field d-flex align-items-center"> 
            <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Senha" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Confirmar Senha" required> </div>
        
        <button class="btn mt-3">Criar conta</button>
        
    </form>
</div>  <!-- ===============Encerra container do formulário de registro=============== -->



<!-- ===============Chama o footer=============== -->
<?php $render('footer'); ?>
<!-- ============================================ -->

