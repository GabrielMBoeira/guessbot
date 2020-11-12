<?php
require_once('src/db/connection.php');
require_once('src/config/functions.php');


$dados['email'] = null;
$dados['password'] = null;
$dados['password-confirm'] = null;


if (isset($_POST['user_register'])) {


    $dados = $_POST;

    $email = htmlspecialchars($dados['email']);
    $password = htmlspecialchars($dados['password']);
    $password_confirm = htmlspecialchars($dados['password-confirm']);


    if (!existEmail($email) && checkPassword($password, $password_confirm)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (email, password, status_login) VALUES (?, ?, ?)";

        $conn = novaConexao();

        $stmt = $conn->prepare($sql);

        $params = [
            $email,
            $passwordHash,
            $status_login = 'active'
        ];

        $stmt->bind_param('sss', ...$params);

        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Email cadastrado com sucesso! <a href="login" class="alert-link">Ir para Login!</a></div>';
        }

        $conn->close();
    } else {
        $_SESSION['msg']= '<div class="alert alert-danger" role="alert">Senhas não conferem ou e-mail já foi cadastrado!</div>';
    }
}

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

    <link rel="stylesheet" href="src/assets/css/user_register.css" />

    <main class="main">
        <div class="div-content">
            <div class="container-fluid">
                <div class="row">
                    <form class="form" action="#" method="post">
                        <div class="header-form">
                            <label>
                                Faça teste gratuitamente
                            </label>
                        </div>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            print_r($_SESSION['msg']);
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <div class="form-group">
                            <label class="label" for="email">
                                Cadastre seu email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?= $dados['email'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="label" for="password">
                                Cadastre sua senha
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
                            <button type="submit" class="btn btn-primary mt-1" name="user_register">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once('template/footer.php');
    ?>