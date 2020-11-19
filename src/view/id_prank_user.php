<?php
require_once('src/config/functions.php');
require_once('template/header_prank.php');

if (isset($_GET['idcl']) && isset($_GET['key'])) {

    $conn = novaConexao();

    $id_user = mysqli_real_escape_string($conn, $_GET['idcl']);
    $hash_link = mysqli_real_escape_string($conn, $_GET['key']);

    $id_user = htmlspecialchars($id_user);
    $hash_link = htmlspecialchars($hash_link);


    $conn->close();
} else {
    header('location: login');
}

?>

<link rel="stylesheet" href="src/assets/css/id_prank_user.css" />

<main class="main">
    <div class="div-content">
        <div class="container-fluid">
            <div class="row">
                <form class="form" action="action" method="post">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <input type="hidden" name="hash_link" value="<?= $hash_link ?>">
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
                        <input type="text" class="form-control" name="id_input" autocomplete="off" required />
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
?>