<?php
require_once('src/config/functions.php');

if (isset($_GET['key']) && isset($_GET['user'])) {
    $key = htmlspecialchars($_GET['key']);
    $email = htmlspecialchars($_GET['user']);
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
                        <a class="nav-link" href="#">Configurações</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <link rel="stylesheet" href="src/assets/css/alter_password_forgot.css" />

    <main class="main">
        <div class="div-content">
            <div class="container-fluid">
                <div class="row">
                    <form class="form" action="action" method="post">
                        <input type="hidden" name="key" value="<?php echo $key ?>">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <div class="header-form">
                            <label>
                                Alterar senha
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="label" for="password">
                                Cadastre nova senha
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>
                        <div class="form-group">
                            <label class="label" for="password-confirm">
                                Confirme sua senha
                            </label>
                            <input type="password" class="form-control" id="password-confirm" name="password-confirm" required />
                        </div>
                        <div class="div-button">
                            <button type="submit" class="btn btn-primary mt-1" name="alter_password-forgot">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    } else {
        header('Location: login');
    }
?>


    <?php
    require_once('template/footer.php');
    ?>