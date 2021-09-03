<?php
  require('./functions.php');
  $funcionarios = lerArquivo('./funcionarios.json');

  if(!empty($_GET["nomeFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["nomeFuncionario"]);
  }

  adicionarFuncionario('Erick', 'Nathan', 'erick.capito@hotmail.com', 'Male', '181929939', 'Brazil', 'TI')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresa X</title>
  <link rel="stylesheet" href="./styles.css">
  <script src="./scripts.js" defer></script>
</head>
<body>
  <h1>Funcionários da empresa X</h1>
  <p>A empresa conta com <?= count($funcionarios) ?> funcionários para este filtro</p>
  <form>
    <input type="text" placeholder="Digite o nome" name="nomeFuncionario" required>
    <button>
      <img src="./search.png" alt="Pesquisar">
    </button>
  </form>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>E-mail</th>
      <th>Sexo</th>
      <th>Endereço IP</th>
      <th>País</th>
      <th>Departamento</th>
    </tr>
    <?php
      foreach($funcionarios as $funcionario) :
    ?>
      <tr>
        <td> <?= $funcionario -> id ?> </td>
        <td> <?= $funcionario -> first_name ?> </td>
        <td> <?= $funcionario -> last_name ?> </td>
        <td> <?= $funcionario -> email ?> </td>
        <td> <?= $funcionario -> gender ?> </td>
        <td> <?= $funcionario -> ip_address ?> </td>
        <td> <?= $funcionario -> country ?> </td>
        <td> <?= $funcionario -> department ?> </td>
      </tr>
    <?php
      endforeach;
    ?>
  </table>
  <div id="add__new">
    <p>+</p>
  </div>
  <div id="container__modal">
      <div id="bg"></div>
      <div class="modal">
        <h2>Adição de novo funcionário</h2>
        <form>
          <input type="text" required placeholder="Primeiro nome">
          <input type="text" required placeholder="Último nome">
          <input type="text" required placeholder="Email">
          <input type="text" required placeholder="Sexo">
          <input type="text" required placeholder="Endereço IP">
          <input type="text" required placeholder="País">
          <input type="text" required placeholder="Departamento">
          <div class="buttons">
            <button id="cancel" type="button">Cancelar</button>
            <button id="send">Adicionar</button>
          </div>
        </form>
      </div>
  </div>
</body>
</html>