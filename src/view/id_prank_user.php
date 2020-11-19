<?php
require_once('src/config/functions.php');

if (isset($_SESSION['email'])) {

    require_once('template/header_prank.php');
?>

    <link rel="stylesheet" href="src/assets/css/id_prank_user.css" />

    <main class="main">
        <div class="div-content">
            <div class="container-fluid">
                <div class="row">
                    <form class="form" action="action" method="post">
                        <input type="hidden" name="id_prank_user" value="<?= $id_prank_user ?>">
                        <div class="header-form">
                            <label>
                                Inserir o ID do usuário:
                            </label>
                        </div>
                        <?php
                        if (isset($_SESSION['confirm-id_prank_user'])) {
                            print_r($_SESSION['confirm-id_prank_user']);
                            unset($_SESSION['confirm-id_prank_user']);
                        }
                        ?>
                        <div class="form-group">
                            <label class="label" for="id_prank">
                                Num. ID:
                            </label>
                            <input type="text" class="form-control" name="id" required />
                        </div>
                        <div class="div-button">
                            <button type="submit" class="btn btn-primary mt-2" name="check_id_prank_user">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    require_once('template/footer.php');
} else {
    header('Location: login');
}
?>