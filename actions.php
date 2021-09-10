<?php
  if(!empty($_GET["input_id"])) {
    editarFuncionario($_GET["input_id"], [
      "id" => $_GET["input_id"],
      "first_name" => $_GET["first_name"],
      "last_name" => $_GET["last_name"],
      "email" => $_GET["email"],
      "gender" => $_GET["gender"],
      "ip_address" => $_GET["ip_address"],
      "country" => $_GET["country"],
      "department" => $_GET["department"],
    ]);
 
    header('location:' . dirname($_SERVER['PHP_SELF']));
  } elseif (!empty($_GET["first_name"]) && !empty($_GET["last_name"]) &&
            !empty($_GET["email"]) && !empty($_GET["gender"]) &&
            !empty($_GET["ip_address"]) && !empty($_GET["country"])
            && !empty($_GET["department"])) {
              adicionarFuncionario([
                "first_name" => $_GET["first_name"],
                "last_name" => $_GET["last_name"],
                "email" => $_GET["email"],
                "gender" => $_GET["gender"],
                "ip_address" => $_GET["ip_address"],
                "country" => $_GET["country"],
                "department" => $_GET["department"],
              ]);

              header('location:' . dirname($_SERVER['PHP_SELF']));
  } elseif(!empty($_GET["filtro"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
  }