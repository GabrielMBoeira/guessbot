<?php
//Limpar input
function clear($input) {
    global $conn;
    //sql
    $var = mysqli_escape_string($conn, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}