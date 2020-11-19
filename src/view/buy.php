<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/assets/css/buy.css" />
    <title>Guessbot</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body class="body">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="login">Login</a>
        </nav>
    </header>

    <main class="main">
        <div class="div-content">
            <div class="div-content-header bg-secondary">
                <div class="title-box">Guessbot</div>
                <div class="subtitle-box">Artificial Intelligence</div>
            </div>
            <div class="div-content-body text-white">
                <div>
                    <h5>
                        Você excedeu o limite de perguntas!
                    </h5>
                </div>
                <div>
                    <p>
                        Clique no link abaixo para comprar
                    </p>
                </div>
                
                <div>
                    <a href="https://pag.ae/7WBhm4tcM/button" target="_blank" title="Pagar com PagSeguro">
                        <img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                    </a>
                </div>
                <div class="mt-2 observation">
                    <p>Seu pagamento será diretamente na plataforma do PagSeguro!</p>
                </div>
                <div class=" observation">
                    <p>Obs: Seu login estará disponível após a compensação!</p>
                </div>
                <div class=" observation">
                    <p>Contato: gabrielmboeira@gmail.com</p>
                </div>
            </div>
        </div>
    </main>

    <script src="src/js/ajax.js"></script>

    <?php
    require_once('template/footer.php');
    ?>