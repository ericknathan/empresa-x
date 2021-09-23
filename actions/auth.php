<?php
session_start();

require_once('../public/scripts/authFunctions.php');

switch ($_GET['action']) {
  case 'login':
    if(isset($_POST['username']) && isset($_POST['password'])) {
      signIn($_POST['username'], $_POST['password'], '../data/cadastros.json');
    }
    break;
    case 'logout':
      signOut();
      break;
  default:
    header('Location: ./index.php?error=Não foi possível completar a ação desejada');
    break;
}