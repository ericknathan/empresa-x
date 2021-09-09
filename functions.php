<?php 

function lerArquivo(string $nomeArquivo) {
  $arquivo = file_get_contents($nomeArquivo);
  $jsonArray = json_decode($arquivo);
  return $jsonArray;
}

function buscarFuncionario(array $funcionarios, string $filtro) {
  $filtroFuncionarios = [];
  foreach($funcionarios as $funcionario) {
    foreach($funcionario as $key => $value) {
      if(strpos(strtolower($funcionario -> $key), strtolower($filtro)) !== false ||
         strpos(strtolower($funcionario -> first_name) . " " . strtolower($funcionario -> last_name), strtolower($filtro)) !== false) {
          $filtroFuncionarios[] = $funcionario;
          break;
      }
    }
  }
  return $filtroFuncionarios;
}

function adicionarFuncionario(array $funcionario) {
  $funcionarios = lerArquivo('funcionarios.json');
  $id = end($funcionarios) -> id + 1;
  $funcionario['id'] = $id;
  $funcionarios[] = $funcionario;
  file_put_contents('funcionarios.json', json_encode($funcionarios));
}
