<?php
// Sessão
session_start();
// Conexão
include_once('db_connect.php');

if(isset($_POST['btn-editar'])){ // verificar se alguém cliclou no butão editar
    $nome = mysqli_escape_string($connect, $_POST['nome']); // filtrando o dado nome
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']); 
    $idade = mysqli_escape_string($connect, $_POST['idade']); 
    
    $id = mysqli_escape_string($connect, $_POST['id']); 

    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id' ";

    if(mysqli_query($connect, $sql)){ // verificar se conseguimos adicionar os dados no banco de dados
        $_SESSION['mensagem'] = "Actualizado com sucesso!";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem sucesso
    } else {
        $_SESSION['mensagem'] = "Erro ao actualizar";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem erro
    }
}?>