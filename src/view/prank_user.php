<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="src/assets/css/prank_user.css"/>

<main class="main">
    <div class="div-content">
        <div class="div-content-header bg-danger">
            <div class="title-box">Usuário chave</div>
        </div>
        <div class="div-content-body">
            <div class="form-group">
                <label for="question" class="label-question">O que você gostaria de saber?</label>
                <input type="text" class="form-control input-question" id="question" readonly />
            </div>
            <div class="form-group">
                <label for="question" class="label-question">Responder a questão:</label>
                <input type="text" class="form-control input-question" id="question" />
                <div class="button d-flex justify-content-end mt-2">
                    <button class="btn btn-danger mt-3">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');
?>