<?php

function novaConexao($banco = 'guessbot') {
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = '';

    $conn = new mysqli($servidor, $usuario, $senha, $banco);

    if($conn->connect_error) {
        die('Erro: ' . $conn->connect_error);
    }

    return $conn;
}