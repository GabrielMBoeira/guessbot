<?php
require_once('connection.php');
require_once('../config/clear_input.php');


//INSERIR PERGUNTA
if (isset($_POST['env-question'])) {

    $question = clear($_POST['question']);

    $sql = "INSERT INTO question (question, user, prank_user, status) VALUES ('$question', 'user', 'prank_user', 'status')";

    if (mysqli_query($conn, $sql)) {
      echo "Sucesso";
    }
    $conn->close();
}

