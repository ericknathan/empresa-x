<?php 
$jsonPath = __DIR__ . '/../../data/funcionarios.json';

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

function buscarFuncionarioPorId(array $funcionarios, string $id) {
  foreach($funcionarios as $funcionario) {
    if(strpos(strtolower($funcionario -> id), strtolower($id)) !== false) {
        return $funcionario;
        break;
    }
  }
}

function adicionarFuncionario(array $funcionario) {
  global $jsonPath;
  $funcionarios = lerArquivo($jsonPath);
  $id = end($funcionarios) -> id + 1;
  $funcionario['id'] = $id;
  $funcionarios[] = $funcionario;
  file_put_contents($jsonPath, json_encode($funcionarios));
}

function editarFuncionario(string $id, array $funcionarioEditado) {
  global $jsonPath;
  $funcionarios = lerArquivo($jsonPath);
  foreach($funcionarios as $index => $funcionario) {
    if(strpos(strtolower($funcionario -> id), strtolower($id)) !== false) {
        $funcionarios[$index] = $funcionarioEditado;
        break;
    }
  }
  file_put_contents($jsonPath, json_encode($funcionarios));
}

function deletarFuncionario(string $idFuncionario) {
  global $jsonPath;
  $funcionarios = lerArquivo($jsonPath);
  foreach($funcionarios as $index => $funcionario) {
    if(strpos(strtolower($funcionario -> id), strtolower($idFuncionario)) !== false) {
        unset($funcionarios[$index]);
        break;
    }
  }
  file_put_contents($jsonPath, json_encode(array_values($funcionarios)));
}

function inserirInformacoes(string $userId) {
  global $jsonPath;
  $funcionarios = lerArquivo($jsonPath);
  $user = buscarFuncionarioPorId($funcionarios, $userId);
  return $user;
}