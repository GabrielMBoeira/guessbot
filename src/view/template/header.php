<?php
require_once('src/config/functions.php');

//NÃO MEXER POIS ESTES DADOS ALIMENTAM O SISTEMA
$email = $_SESSION['email'];
$id_prank_user = getIdPrankUser($email);
$hash = hashEmailIdPrankUser($email);
$id_user = getPKUser($email);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/assets/css/template.css" />
  <title>Guessbot</title>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body class="body">
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="ask">Guessbot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#content-nav" aria-controls="content-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="content-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Configuração</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" target="_blank" href="id_prank_user?idcl=<?= $id_user ?>&key=<?= $hash ?>">Usuário chave</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="logout">Sair</a>
          </li>
        </ul>
        <a class="link-id mr-5" href="alter_id">ID Usuário chave: <?= $id_prank_user ?></a>
        
        
      </div>
    </nav>
  </header>