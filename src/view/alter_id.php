<?php
require_once('template/header.php');

if (isset($_SESSION['email'])) {

?>

    <link rel="stylesheet" href="src/assets/css/alter_id.css" />

    <main class="main">
        <div class="div-content">
            <div class="container-fluid">
                <div class="row">
                    <form class="form" action="action" method="post">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <div class="header-form">
                            <label>
                                Gerar novo ID:
                            </label>
                        </div>
                        <?php
                        if (isset($_SESSION['alter-id'])) {
                            print_r($_SESSION['alter-id']);
                            unset($_SESSION['alter-id']);
                        }
                        ?>
                        <div class="form-group">
                            <label class="label" for="id_prank">
                                Inserir novo ID prank user:
                            </label>
                            <input type="text" class="form-control" name="id_prank_user" />
                        </div>
                        <div class="div-button">
                            <button type="submit" class="btn btn-primary mt-2" name="save_alter_id">
                                Salvar
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