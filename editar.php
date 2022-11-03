<?php
// Conexão
include_once('php_action/db_connect.php');
// Header
include_once('includes/header.php');
// Select
if(isset($_GET['id'])){ // (a variavel GET irá levar o id que vem da URL) verificar se existe esse parâmetro id na URL através da superglobal GET
    $id = mysqli_escape_string($connect, $_GET['id']); // recebendo o id da superglobal GET

    $sql = "SELECT * FROM clientes Where id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado); // $dados recebendo os dados do banco de dados
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> <!-- input que ninguém irá ver no formulario -->
            <div class="input-field col s12">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>"> <!-- value irá mostrar os dados do usuario nos campos de input -->
            </div>

            <div class="input-field col s12">
                <label for="nome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
            </div>

            <div class="input-field col s12">
                <label for="nome">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
            </div>

            <div class="input-field col s12">
                <label for="nome">Idade</label>
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
            </div>

            <button type="submit" name="btn-editar"class="btn">Actualizar</button>
            <a href="index.php" type="submit" class="btn green">Lista de clientes</a>
        </form>
    </div>
</div>
<?php
// Footer
include_once('includes/footer.php');
// php -S localhost:8000 >>> http://localhost/cursophp.com/crud/index.php
?>