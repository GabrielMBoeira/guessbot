<?php

require_once('src/db/connection.php');
require_once('clear_input.php');


//BUSCAR SE EMAIL EXISTE NA BASE DE DADOS
function existEmail($conn, $email) {

    $sql = "SELECT email FROM login WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($dados = $result->fetch_assoc()) {
            return $dados;
        }
    } 
}

//VERIFICAR SE PASSWORD ESTÁ IGUALMENTE DIGITADO
function checkPassword($password, $confirm_password) {

    if ($password === $confirm_password) {
        $check = true;
    } else {
        $check = false;
    }

    return $check;
}
