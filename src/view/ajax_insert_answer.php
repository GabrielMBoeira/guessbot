<?php
session_start();
require_once('src/db/Connection.php');

$user = $_SESSION['email'];

header('Content-Type: application/json');

$answer = $_POST['answer'];

$sql = "INSERT INTO question (question, user, prank_user, answer, status) 
    VALUES (?, ?, ?, ?, ?)";

$conn = novaConexao();

$stmt = $conn->prepare($sql);

$params = [
    $question = 'Aguardando pergunta',
    $user,
    $prank_user = 'prank_user',
    $answer,
    $status = 'status'
];

$stmt->bind_param('sssss', ...$params);

if ($stmt->execute()) {
    echo json_encode('Salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar');
}



