<?php
session_start();

require_once('src/db/Connection.php');

//BUSCAR SE EMAIL EXISTE NA BASE DE DADOS
function existEmail($email)
{

    $conn = novaConexao();

    $sql = "SELECT email FROM login WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows >= 0) {
        $dados = $result->fetch_assoc();
    } else {
        $dados = null;
    }

    return $dados;

    $conn->close();
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
function validUser($email, $password)
{

    $conn = novaConexao();

    $sql = "SELECT * FROM login WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        $password_hash = password_verify($password, $dados['password']);
        $status_login = $dados['status_login'];
        

        if ($password_hash && $status_login === 'active') {
            $_SESSION['user'] = $dados['id_user'];
            $dados = true;
        } else {
            $_SESSION['error-login'] = '<div class="alert alert-danger" role="alert">Senha ou e-mail inválido!</div>';
            $dados = false;
        }
        return $dados;
    } else {
        $_SESSION['error-login'] = '<div class="alert alert-danger" role="alert">Email não cadastrado!</div>';
    }

    $conn->close();
}
