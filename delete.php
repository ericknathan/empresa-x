<?php 
  require('./functions.php');

  if(isset($_GET['id'])) {
    deletarFuncionario($_GET["id"]);
    header('location:' . dirname($_SERVER['PHP_SELF']));
  }

?>