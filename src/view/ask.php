<?php
require_once('template/header.php');
require_once('src/db/connection.php');
?>

<link rel="stylesheet" href="src/assets/css/ask.css" />

<main class="main">
    <div class="div-content">
        <div class="div-content-header bg-secondary">
            <div class="title-box">Guessbot</div>
            <div class="subtitle-box">Artificial Intelligence</div>
        </div>
        <div class="div-content-body">
            <form action="src/db/actions.php" method="post">
                <div class="form-group">
                    <label for="question" class="label-question">O que você gostaria de saber?</label>
                    <input type="text" class="form-control input-question" id="question" name="question"/>
                </div>
                <div class="form-group">
                    <label for="question" class="label-answer">Resposta:</label>
                    <div class="div-answer form-control" id="answer"></div>
                    <div class="button d-flex justify-content-end mt-2">
                        <button class="btn btn-primary mt-1" id="submit" name="env-question">Perguntar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>

    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState === 4 && req.status === 200) {

                var resposta = JSON.parse(req.responseText);
                
                document.getElementById('answer').innerHTML = resposta.answer;
                
            }
        }
        req.open('GET', 'ajax_answer', true);
        req.send();
    }  

    setInterval(() => {
        ajax();
    }, 1000);

</script>

<?php
require_once('template/footer.php');
?>