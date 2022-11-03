<?php
// Sessão
session_start();

// Conexão
include_once('db_connect.php');

// Limpar
function clear($input){
    global $connect; // chamando a variavel connect

    // sql
    $var =  mysqli_escape_string($connect, $input);
    // xss >>> função para impedir que os HACKERS insirem scripts nos inputs
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])){ // verificar se alguém cliclou no butão cadastrar
    $nome = clear($_POST['nome']); // filtrando o dado nome
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']); 
    $idade = clear($_POST['idade']); 

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)){ // verificar se conseguimos adicionar os dados no banco de dados
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem sucesso
    } else {
        $_SESSION['mensagem'] = "Erro ao Cadastrar";
        header('Location: ../index.php'); // iremos retornar para index com a mensagem erro
    }
}
?>