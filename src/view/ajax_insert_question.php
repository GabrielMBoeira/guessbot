<?php

require_once('src/db/Connection.php');

header('Content-Type: application/json');

$question = $_POST['question'];

$sql = "INSERT INTO question (question, user, prank_user, answer, status) VALUES (?, ?, ?, ?, ?)";

$conn = novaConexao();

$stmt = $conn->prepare($sql);

$params = [
    $question,
    $user = 'user',
    $prank_user = 'prank_user',
    $answer = 'Loading... Artificial Inteligence',
    $status = 'status'
];

$stmt->bind_param('sssss', ...$params);

if ($stmt->execute()) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}



