<?php $render('header'); ?>

<div class="wrapper">
    <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div>
    <div class="text-center mt-4 name"> Recuperar senha </div>
    <form class="p-3 mt-3" method="POST" action="#">
        <div class="form-field d-flex align-items-center"> <span class="fas fa-at"></span> <input type="text" name="userName" id="userName" placeholder="Email"> </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="password" name="password" id="pwd" placeholder="Usuário"> </div> <button class="btn mt-3">Entrar</button>
    </form>
    <div class="text-center fs-6"> <a href="<?php echo $base;?>">Voltar</a></div>
</div>

<?php $render('footer'); ?>