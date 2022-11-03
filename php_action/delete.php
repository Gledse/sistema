<?php
// Sessão
session_start();

// Conexão
include_once('db_connect.php');


if(isset($_POST['btn-deletar'])){ // verificar se alguém cliclou no butão deletar
    
    $id = mysqli_escape_string($connect, $_POST['id']); 

    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){ // verificar se conseguimos adicionar os dados no banco de dados
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem sucesso
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem erro
    }
}
?>