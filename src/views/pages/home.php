<!-- Página Home, Login -->

<?php $render('header'); ?>

<div class="wrapper">
    <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div>
    
        <!-- Mensagem de alerta ao usuário no erro de login -->
        <?php if(isset($_SESSION['erroLogin']) && !empty($_SESSION['erroLogin'])): ?>
            <div class="text-center alert alert-warning mt-3">
                <?php 
                echo $_SESSION['erroLogin']; 
                unset( $_SESSION['erroLogin']);
                ?>
            </div>
        <?php endif; ?>
    

    <div class="text-center mt-4 name"> Seja bem vindo(a) </div>
    <form class="p-3 mt-3" method="post" action="<?php echo $base;?>/fazLogin">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="userName" id="userName" placeholder="Usuário"> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Senha"> </div> <button class="btn mt-3">Entrar</button>
    </form>
    <div class="text-center fs-6"> <a href="<?php echo $base;?>/esqueceu">Esqueceu a senha?</a> ou <a href="<?php echo $base;?>/registrar">Criar conta</a> </div>
</div>

<?php $render('footer'); ?>