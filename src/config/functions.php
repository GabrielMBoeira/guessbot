<?php
session_start();

require_once('src/db/connection.php');
require_once('clear_input.php');


//BUSCAR SE EMAIL EXISTE NA BASE DE DADOS
function existEmail($conn, $email)
{

    $sql = "SELECT email FROM login WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($dados = $result->fetch_assoc()) {
            return $dados;
        }
    }
}

//VERIFICAR SE PASSWORD ESTÁ IGUALMENTE DIGITADO NO CADASTRO DE USUÁRIOS
function checkPassword($password, $confirm_password)
{

    if ($password === $confirm_password) {
        $check = true;
    } else {
        $check = false;
    }

    return $check;
}

//VERIFICAR SE USUÁRIO É VALIDO
function validUser($conn, $email, $password)
{

    $sql = "SELECT * FROM login WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        $dados = $result->fetch_assoc();

        $id_user = $dados['id_user'];
        $hash = $dados['password'];
        $status = $dados['status_login'];

        $passwordVerify = password_verify($password, $hash);

        if ($passwordVerify && $status === 'active') {
            
            $_SESSION['user'] = $id_user;

            return $_SESSION['user'];

        } else {
            echo 'Senha inválida ou email expirou';
        }
    } else {
        echo 'Email não cadastrado';
    }
}
