<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="src/assets/css/ask.css" />

<main class="main">
  <div class="div-content">
    <div class="div-content-header bg-secondary">
      <div class="title-box">Guessbot</div>
      <div class="subtitle-box">Artificial Intelligence</div>
    </div>
    <div class="div-content-body">
      <div class="form-group">
        <label for="question" class="label-question">O que você gostaria de saber?</label>
        <input type="text" class="form-control input-question" id="question" />
      </div>
      <div class="form-group">
        <label for="question" class="label-question">Resposta:</label>
        <div id="read"></div>
        <div class="button d-flex justify-content-end mt-2">
          <button class="btn btn-primary mt-3" id="submit">Perguntar</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require_once('template/footer.php');
?>