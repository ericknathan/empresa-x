<?php 

function lerArquivo(string $nomeArquivo) {
  $arquivo = file_get_contents($nomeArquivo);
  $jsonArray = json_decode($arquivo);
  return $jsonArray;
}

function buscarFuncionario(array $funcionarios, string $termo) {
  $filtroFuncionarios = [];
  foreach($funcionarios as $funcionario) {
    foreach($funcionario as $key => $prop) {
      if(strpos(strtolower($funcionario -> $key), strtolower($termo)) !== false) {
        $filtroFuncionarios[] = $funcionario;
      }
    }
  }
  return $filtroFuncionarios;
}

function adicionarFuncionario($nome, $sobrenome, $email, $sexo, $ip, $pais, $departamento) {
  $arquivo = lerArquivo('./funcionarios.json');
  $id = "1100002";
  //Editando a linha que vc quer
  $arquivo[0][] = [
    "id" => $id,
    "first_name" => $nome,
    "last_name" => $sobrenome,
    "email" => $email,
    "gender" => $sexo,
    "ip_address" => $ip,
    "country" => $pais,
    "department" => $departamento
  ];
  // TODO!
}