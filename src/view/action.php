<?php
require_once('src/config/functions.php');


//Alterar senha password - Esqueci a senha
if (isset($_POST['alter_password-forgot'])) {

    $conn = novaConexao();

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_confirm = mysqli_real_escape_string($conn, $_POST['password-confirm']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $key = mysqli_real_escape_string($conn, $_POST['key']);

    if (checkPassword($password, $password_confirm) && checkKey($email, $key)) {

        $sql = "UPDATE LOGIN SET password = ? WHERE email = ? ";

        $stmt = $conn->prepare($sql);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $params = [
            $password_hash,
            $email
        ];

        $stmt->bind_param('ss', ...$params);

        if ($stmt->execute()) {
            $_SESSION['msg-forgot-password'] = '<div class="alert alert-success" role="alert">Senha alterada com sucesso! <a href="login" class="alert-link">Ir para Login!</a></div>';
            header('Location: confirm_password_forgot');
        } else {
            header('Location: confirm_password_forgot');
            $_SESSION['msg-forgot-password'] = '<div class="alert alert-danger" role="alert">Erro ao alterar senha <a href="login" class="alert-link">Ir para Login!</a></div>';
        }
    } else {
        header('Location: confirm_password_forgot');
        $_SESSION['msg-forgot-password'] = '<div class="alert alert-danger" role="alert">Senhas não conferem solicitar novamente! <a href="login" class="alert-link">Ir para Login!</a></div>';
    }
    $conn->close();
}



if (isset($_POST['save_alter_id'])) {

    $conn = novaConexao();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id_prank_user = mysqli_real_escape_string($conn, $_POST['id_prank_user']);

    $id_prank_user = preg_replace("/\s+/", "", $id_prank_user);

    $sql = "UPDATE LOGIN SET id_prank_user = ? WHERE email = ? ";

    $stmt = $conn->prepare($sql);


    $params = [
        $id_prank_user,
        $email
    ];

    $stmt->bind_param('ss', ...$params);

    if ($stmt->execute()) {
        $_SESSION['alter-id'] = '<div class="alert alert-success" role="alert">ID alterado com sucesso!</div>';
        header('Location: alter_id');
    } else {
        $_SESSION['alter-id'] = '<div class="alert alert-danger" role="alert">Erro ao alterar ID</div>';
        header('Location: alter_id');
    }

    $conn->close();
}

//CHECK ID PRANK USER
if (isset($_POST['check_id_prank_user'])) {

    $conn = novaConexao();

    $id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
    $hash_link = mysqli_real_escape_string($conn, $_POST['hash_link']);
    $input = mysqli_real_escape_string($conn, $_POST['id_input']);

    if (hashVerify($id_user, $hash_link, $input)) {
        header('Location: prank_user?idcl=' . $id_user . '&key=' . $hash_link . '&i=' . $input);
    } else {
        $_SESSION['confirm-id_prank_user'] = '<div class="alert alert-danger" role="alert">Chave inválida! <a href="login" class="alert-link">Ir para Login!</a></div>';
        header('Location: id_prank_user?idcl=' . $id_user . '&key=' . $hash_link);
    }
}
