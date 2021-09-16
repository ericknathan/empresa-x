<?php
  if(!empty($_GET["filtro"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
  }