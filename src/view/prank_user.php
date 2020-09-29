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


            <div class="test" id="teste"></div>



            <form action="src/db/actions.php" method="post">
                <div class="form-group">
                    <label for="question" class="label-question">O que você gostaria de saber?</label>
                    <input type="text" class="form-control input-question" id="question" name="question" />
                </div>
                <div class="form-group">
                    <label for="question" class="label-answer">Resposta:</label>
                    <input type="text" class="form-control" id="" />
                    <div class="button d-flex justify-content-end mt-2">
                        <button class="btn btn-danger mt-1" id="submit" name="env-answer">Perguntar</button>
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
                    document.getElementById('teste').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'testeajax', true);
            req.send();
        }


        setInterval(function() {
            ajax();
        }, 1000);
</script>

<?php
require_once('template/footer.php');
?>