<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="src/assets/css/password_forgot.css" />

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
                        <input type="text" class="form-control" id="email" />
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