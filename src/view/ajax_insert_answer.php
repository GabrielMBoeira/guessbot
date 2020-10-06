<?php

require_once('src/db/connection.php');
require_once('src/config/clear_input.php');

header('Content-Type: application/json');

$input_answer = $_POST['answer'];

$answer = clear($input_answer);

$sql = "INSERT INTO question (question, user, prank_user, answer, status) 
    VALUES ('Aguardando Pergunta...', 'user', 'prank_user', '$answer', 'status')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}



