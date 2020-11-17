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

}

