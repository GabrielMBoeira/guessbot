<?php
require_once('src/config/functions.php');
require_once('template/header_prank.php');

if (isset($_GET['idcl']) && isset($_GET['key']) && isset($_GET['i'])) {

    $conn = novaConexao();

    $id_user = mysqli_real_escape_string($conn, $_GET['idcl']);
    $hash_link = mysqli_real_escape_string($conn, $_GET['key']);
    $input = mysqli_real_escape_string($conn, $_GET['i']);

    hashVerify($id_user, $hash_link, $input) ?: header('location: login');
    
    $conn->close();
} else {
    header('location: login');
}

?>

<link rel="stylesheet" href="src/assets/css/prank_user.css" />

<main class="main">
    <div class="div-content">
        <div class="div-content-header bg-danger">
            <div class="title-box">Usuário chave</div>
        </div>
        <div class="div-content-body">
            <form id="form2">
                <div id="id"></div>
                <div class="form-group">
                    <label for="question" class="label-question">O que você gostaria de saber?</label>
                    <div class="div-question form-control" id="question2" name="question2"></div>
                </div>
                <div class="form-group">
                    <label for="question form-control" class="label-answer">Resposta:</label>
                    <input type="text" class="form-control" id="answer2" name="answer2" autocomplete="off" />
                    <div class="button d-flex justify-content-end mt-2">
                        <button class="btn btn-danger mt-1" id=" submit" name="env-answer">Responder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="src/js/ajax.js"></script>

<?php
require_once('template/footer.php');
?>