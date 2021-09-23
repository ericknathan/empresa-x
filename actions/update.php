<?php 
  require('../public/scripts/functions.php');

  if(!empty($_GET["input_id"])) {

    $novoFuncionario = [
      "id" => $_GET["input_id"],
      "first_name" => $_GET["first_name"],
      "last_name" => $_GET["last_name"],
      "email" => $_GET["email"],
      "gender" => $_GET["gender"],
      "ip_address" => $_GET["ip_address"],
      "country" => $_GET["country"],
      "department" => $_GET["department"],
    ];
    editarFuncionario("../data/funcionarios.json", $novoFuncionario);
 
    header('location: ../area_restrita.php');
  } else {
    header('location: ../error.php?error=O id do usuário não foi inserido');
  }

?>