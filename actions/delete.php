<?php 
  require('../public/scripts/functions.php');

  if(isset($_GET['id'])) {
    deletarFuncionario("../data/funcionarios.json", $_GET["id"]);
    header('location: ../area_restrita.php');
  } else {
    header('location: ../error.php?error=O id do usuário não foi inserido');
  }

?>