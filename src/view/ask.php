<?php
require_once('template/header.php');
require_once('src/db/connection.php');

if (isset($_SESSION['email'])) {
    
$email = $_SESSION['email'];

//LIMITANDO O NUMERO DE PERGUNTAS POR USUARIO   
countQuestions($email) <= 50 ?: header('Location: buy');

?>

    <link rel="stylesheet" href="src/assets/css/ask.css" />

    <main class="main">
        <div class="div-content">
            <div class="div-content-header bg-secondary">
                <div class="title-box">Guessbot</div>
                <div class="subtitle-box">Artificial Intelligence</div>
            </div>
            <div class="div-content-body">
                <form id="form1">
                    <div class="form-group">
                        <label for="question" class="label-question">O que você gostaria de saber?</label>
                        <input type="text" class="form-control input-question" id="question1" name="question1" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="question" class="label-answer">Resposta:</label>
                        <div class="div-answer form-control" id="answer1" name="answer1"></div>
                        <div class="button d-flex justify-content-end mt-2">
                            <button class="btn btn-primary mt-1" id="submit">Perguntar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="src/js/ajax.js"></script>

<?php
    require_once('template/footer.php');
} else {
    header('Location: login');
}
?>