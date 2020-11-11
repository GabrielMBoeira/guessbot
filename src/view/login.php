<?php
require_once('src/config/functions.php');

if (isset($_POST['login'])) {

   $dados = $_POST;

   $email = clear($dados['email']);
   $password = clear($dados['password']);

   if (validUser($conn, $email, $password)) {
      header('Location: ask');
   }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
   <link rel="stylesheet" href="src/assets/css/login.css" />
   <title>Guessbot</title>
</head>

<body class="body">
   <header class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="#">Guessbot</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#content-nav" aria-controls="content-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="content-nav">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="user_register">Cadastrar usuário</a>
               </li>
            </ul>
         </div>
      </nav>
   </header>

   <main class="main">
      <div class="div-content">
         <div class="container-fluid">
            <div class="row row-form">
               <form class="form" action="#" method="post">
                  <?php
                  if (isset($_SESSION['erro-login'])) {
                     print_r($_SESSION['erro-login']);
                     unset($_SESSION['erro-login']);
                  }
                  ?>
                  <div class="form-group">
                     <label class="label" for="email">
                        E-mail:
                     </label>
                     <input type="email" class="form-control" id="email" name="email" required/>
                  </div>
                  <div class="form-group">
                     <label class="label" for="password">
                        Senha:
                     </label>
                     <input type="password" class="form-control" id="password" name="password" required/>
                  </div>
                  <div class="div-button">
                     <button type="submit" class="btn btn-primary mt-4" name="login">
                        Entrar
                     </button>
                     <a type="submit" href="password_forgot" class="btn btn-success mt-4" name="password_forgo">
                        Esqueci a senha
                     </a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
   </main>

   <footer class="footer d-flex justify-content-end align-items-center text-white">
      <span class="mr-3">Gessbot 2020 </span>
   </footer>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>