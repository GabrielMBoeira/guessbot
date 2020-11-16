<?php
require_once('src/config/functions.php');

if (isset($_POST['password_forgot'])) {

    $conn = novaConexao();

    $email = htmlspecialchars($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    if (existEmail($email)) {

        $crypt_password = substr(md5(time()), 0, 8);
        $new_password = md5(md5($crypt_password));

        $sql = "UPDATE login SET password = ? WHERE email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ss', $new_password, $email);

        if ($stmt->execute()) {
            $_SESSION['error-forgot'] =  '<div class="alert alert-success" role="alert">Senha enviada por email!</div>';
        } else {
            $_SESSION['error-forgot'] = '<div class="alert alert-danger" role="alert">Erro ao solicitar senha!</div>';
        }
    } else {
        $_SESSION['error-forgot'] = '<div class="alert alert-danger" role="alert">Email não cadastrado!</div>';
    }

    $conn->close();
}

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
                    <form class="form" action="password_forgot" method="post">
                        <?php
                        if (isset($_SESSION['error-forgot'])) {
                            print_r($_SESSION['error-forgot']);
                            unset($_SESSION['error-forgot']);
                        }
                        ?>
                        <div class="form-group title-recovery">
                            <label class="label">
                                RECUPERAÇÃO DE SENHA
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="label" for="email">
                                E-mail:
                            </label>
                            <input type="email" class="form-control" name="email" autocomplete="off" required />
                        </div>
                        <div class="div-button">
                            <button type="submit" class="btn btn-primary mt-4" name="password_forgot">
                                Enviar solicitação
                            </button>
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