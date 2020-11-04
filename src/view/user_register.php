<?php
require_once('template/header.php');
require_once('src/db/connection.php');
require_once('src/config/clear_input.php');
require_once('src/config/functions.php');

session_start();


$dados['email'] = null;
$dados['password'] = null;
$dados['password-confirm'] = null;


if (isset($_POST['user_register'])) {

    $dados = $_POST;

    $email = clear($dados['email']);
    $password = clear($dados['password']);
    $password_confirm = clear($dados['password-confirm']);

    if (!existEmail($conn, $email) && checkPassword($password, $password_confirm)) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (email, password, status_login) VALUES ('$email', '$passwordHash', 'active')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['msg'] =  '<div class="alert alert-success" role="alert">Cadastrado com sucesso!</div>';
        }
    } else {
        $_SESSION['msg'] =  '<div class="alert alert-danger" role="alert">Senhas não conferem ou e-mail já está cadastrado</div>';
    }
}

?>

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
                        <input type="email" class="form-control" id="email" name="email" required value="<?= $dados['email']?>"/>
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