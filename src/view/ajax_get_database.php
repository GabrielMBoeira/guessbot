<?php

header('Content-Type: application/json');

require_once('src/db/connection.php');

$sql = "SELECT * FROM question";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($dados = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
        echo json_encode($dados);
    }
    
} else {
    echo json_encode('Erro o retornar dados!');
}

