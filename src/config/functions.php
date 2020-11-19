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

//GERAR CHAVE DE ACESSO PARA RECUPERAÇÃO DE SENHA
function newKeyAccess($email)
{

    $conn = novaConexao();

    $sql = "SELECT id_user, password FROM login WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        $key = sha1($dados['id_user'] . $dados['password']);
    }
    return $key;

    $conn->close();
}

//GERAR CHAVE DE ACESSO PARA RECUPERAÇÃO DE SENHA
function checkKey($email, $key)
{

    $conn = novaConexao();

    $sql = "SELECT id_user, password FROM login WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        $keyCorrect = sha1($dados['id_user'] . $dados['password']);

        if ($key === $keyCorrect) {
            return $dados['id_user'];
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado!</div>';
        }
    }
    $conn->close();
}

function getIdPrankUser($email)
{

    $conn = novaConexao();

    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT id_prank_user FROM login WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id_prank_user = $row['id_prank_user'];
        return $id_prank_user;
    } else {
        echo 'Não há retorno de ID do banco de dados = getIdPrankUser';
    }
    $conn->close();
}

function checkIdPrankUser($id_prank_user, $id)
{

    if ($id_prank_user === $id) {
        $check = true;
    } else {
        $check = false;
    }

    return $check;
}

//HASH EMAIL + IDPRANKUSER
function hashEmailIdPrankUser($email)
{

    $conn = novaConexao();

    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT email, id_prank_user FROM login WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $email = $row['email'];
        $id_prank_user = $row['id_prank_user'];

        $hash = sha1($email . $id_prank_user);

        return $hash;
    } else {
        echo 'Não há retorno de ID do banco de dados = hashEmailIdPrankUser';
    }
    $conn->close();
}

//Pegar o ID do usuário
function getPKUser($e_mail)
{

    $conn = novaConexao();

    $email = mysqli_real_escape_string($conn, $e_mail);

    $sql = "SELECT id_user FROM login WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $e_mail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id_user = $row['id_user'];
        return $id_user;
    } else {
        echo 'Não há retorno de ID do usuário do banco de dados = getPKUSER';
    }
    $conn->close();
}

function getEmailUser($idPKuser)
{

    $conn = novaConexao();

    $idPKuser = mysqli_real_escape_string($conn, $idPKuser);

    $sql = "SELECT email FROM login WHERE id_user = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idPKuser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $email = $row['email'];
        return $email;
    } else {
        $_SESSION['confirm-id_prank_user'] =  '<div class="alert alert-danger" role="alert">Não há retorno de ID do usuário do banco de dados = getEmailUser</div>';
    }
    $conn->close();
}

//VERIFICANDO HASH ID_PRANK_USER
function hashVerify($id_user, $hash_link, $input)
{

    $conn = novaConexao();

    $id_user = mysqli_real_escape_string($conn, $id_user);
    $hash_link = mysqli_real_escape_string($conn, $hash_link);

    $sql = "SELECT email, id_prank_user FROM login WHERE id_user = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $email = $row['email'];
        $id_prank_user = $row['id_prank_user'];

        $hash = sha1($email . $id_prank_user);

        if ($hash === $hash_link && $input === $id_prank_user) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    $conn->close();
}

//CONTAR QUANTAS QUESTÕES FORAM FEITAS
function countQuestions($email)
{
    $conn = novaConexao();

    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT SUM(counter) as total FROM question WHERE user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_Result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalQuestion = $row['total'];

        return $totalQuestion;
    }
}
