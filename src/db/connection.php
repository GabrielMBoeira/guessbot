<?php
require_once('env.php');

$conn = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($conn, "utf8");

if (mysqli_connect_error($conn)) {
    echo "Erro na conexao ".mysqli_connect_error();
}