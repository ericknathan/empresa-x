<?php
  require('./functions.php');
  $funcionarios = lerArquivo('./funcionarios.json');

  if(!empty($_GET["nomeFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["nomeFuncionario"]);
  }

  if(!empty($_GET["first_name"]) && !empty($_GET["last_name"]) &&
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

      $funcionarios = lerArquivo('./funcionarios.json');
  }

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
          <input type="text" name="first_name" required placeholder="Primeiro nome">
          <input type="text" name="last_name" required placeholder="Último nome">
          <input type="text" name="email" required placeholder="Email">
          <input type="text" name="gender" required placeholder="Sexo">
          <input type="text" name="ip_address" required placeholder="Endereço IP">
          <input type="text" name="country" required placeholder="País">
          <input type="text" name="department" required placeholder="Departamento">
          <div class="buttons">
            <button id="cancel" type="button">Cancelar</button>
            <button id="send">Adicionar</button>
          </div>
        </form>
      </div>
  </div>
</body>
</html>