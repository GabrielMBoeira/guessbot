<?php

require_once('src/db/Connection.php');
require_once(dirname(__FILE__,2) . '/db/Connection.php');

$sql = "SELECT * FROM question";

$conn = novaConexao();

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} else {
    echo json_encode('Erro na consulta do banco de dados');
}
