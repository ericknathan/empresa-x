<?php 
  require('../public/scripts/functions.php');

  if(isset($_GET['id'])) {
    deletarFuncionario($_GET["id"]);
    header('location: ../index.php');
  } else {
    header('location: ../error.php?error=O id do usuário não foi inserido');
  }

?>