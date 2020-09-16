<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="src/assets/css/user_register.css"/>

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
                    <div class="form-group">
                        <label class="label" for="email">
                            Cadastre seu email
                        </label>
                        <input type="text" class="form-control" id="email" />
                    </div>
                    <div class="form-group">
                        <label class="label" for="password">
                            Cadastre sua senha
                        </label>
                        <input type="password" class="form-control" id="password" />
                    </div>
                    <div class="form-group">
                        <label class="label" for="password-confirm">
                            Confirme sua senha
                        </label>
                        <input type="password" class="form-control" id="password-confirm" />
                    </div>
                    <div class="div-button">
                        <button type="submit" class="btn btn-primary mt-2">
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