<?php
session_start();
require_once('src/config/functions.php');

$email = $_SESSION['email'];

logoutSetInput($email);

session_destroy();

header('Location: login');
