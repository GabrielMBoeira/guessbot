<?php
require_once('template/header.php');

?>

<link rel="stylesheet" href="src/assets/css/prank_user.css" />

<main class="main">
    <div class="div-content">
        <div class="div-content-header bg-danger">
            <div class="title-box">Usuário chave</div>
        </div>
        <div class="div-content-body">
            <form action="src/db/actions.php" method="post">
                <div id="id"></div>
                <div class="form-group">
                    <label for="question" class="label-question">O que você gostaria de saber?</label>
                    <div class="div-question form-control" id="question"></div>
                </div>
                <div class="form-group">
                    <label for="question form-control" class="label-answer">Resposta:</label>
                    <input type="text" class="form-control" name="answer" />
                    <div class="button d-flex justify-content-end mt-2">
                        <button class="btn btn-danger mt-1" id=" submit" name="env-answer">Responder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>


    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {

                var resposta = JSON.parse(req.responseText);

                document.getElementById('id').innerHTML = "<input type='hidden' name='id' value='" + resposta.id_question + "'>"
                document.getElementById('question').innerHTML = resposta.question


            }
        }
        req.open('GET', 'ajax_question', true);
        req.send();
    }

    setInterval(function() {
    ajax();
    }, 1000);
    
</script>

<?php
require_once('template/footer.php');
?>