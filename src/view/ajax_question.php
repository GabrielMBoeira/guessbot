<?php

require_once('src/db/connection.php');

$sql = "SELECT * from question";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($dados = mysqli_fetch_assoc($result)) {
        echo json_encode($dados);
    }
    
}