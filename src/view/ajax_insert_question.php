<?php

require_once('src/db/connection.php');
require_once('src/config/clear_input.php');

header('Content-Type: application/json');

$input_question = $_POST['question'];

$question = clear($input_question);

$sql = "INSERT INTO question (question, user, prank_user, answer, status) 
    VALUES ('$question', 'user', 'prank_user', 'Loading... Artificial Intelligence', 'status')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}



