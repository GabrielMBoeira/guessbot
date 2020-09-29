<?php

try {
    $dns = "mysql:dbname=guessbot;host=localhost";
    $user = "root";
    $password = "";
    $con = new PDO($dns, $user, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

