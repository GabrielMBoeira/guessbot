<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/assets/css/password_forgot.css" />
    <title>Guessbot</title>
</head>

<body class="body">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Guessbot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#content-nav" aria-controls="content-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="content-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="user_register">Cadastrar usuário</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="div-content">
            <div class="container-fluid">
                <div class="row row-form">
                    <form class="form" action="#" method="post">
                        <div class="form-group title-recovery">
                            <label class="label">
                                RECUPERAÇÃO DE SENHA
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="label" for="email">
                                E-mail:
                            </label>
                            <input type="text" class="form-control" id="email" autocomplete="off"/>
                        </div>
                        <div class="div-button">
                            <a type="submit" href="#" class="btn btn-primary mt-4">
                                Enviar solicitação
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>

    <?php
    require_once('template/footer.php');
    ?>