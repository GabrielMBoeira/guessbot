<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="src/assets/css/id_prank_user.css" />

<main class="main">
    <div class="div-content">
        <div class="container-fluid">
            <div class="row">
                <form class="form" action="#" method="post">
                    <div class="header-form">
                        <label>
                            Inserir o ID do usuário:
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label" for="id_prank">
                            Num. ID:
                        </label>
                        <input type="text" class="form-control" id="id_prank" />
                    </div>
                    <div class="div-button">
                        <a type="submit" class="btn btn-primary mt-2" href="prank_user">
                            Entrar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');
?>