<?php
// Header
include_once('includes/header.php');

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Cliente</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="input-field col s12">
                <label for="nome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome">
            </div>

            <div class="input-field col s12">
                <label for="nome">Email</label>
                <input type="text" name="email" id="email">
            </div>

            <div class="input-field col s12">
                <label for="nome">Idade</label>
                <input type="text" name="idade" id="idade">
            </div>

            <button type="submit" name="btn-cadastrar"class="btn">Cadastar</button>
            <a href="index.php" type="submit" class="btn green">Lista de clientes</a>
        </form>
    </div>
</div>

<?php
// Footer
include_once('includes/footer.php');
// php -S localhost:8000 >>> http://localhost/cursophp.com/crud/index.php
?>