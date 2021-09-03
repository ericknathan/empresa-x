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
        break;
      }
    }
  }
  return $filtroFuncionarios;
}

function adicionarFuncionario(array $funcionario) {
  $funcionarios = lerArquivo('funcionarios.json');
  $id = count($funcionarios) + 1;
  $funcionario['id'] = $id;
  $funcionarios[] = $funcionario;
  $json = json_encode($funcionarios);
  file_put_contents('funcionarios.json', $json);
}