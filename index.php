<?php
  require('./public/scripts/functions.php');
  $funcionarios = lerArquivo('./data/funcionarios.json');
  require('./actions/search.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresa X</title>
  <link rel="stylesheet" href="./public/styles/global.css">
  <script src="./public/scripts/scripts.js" defer></script>
  <script src="https://kit.fontawesome.com/7cbb7ae6e7.js" crossorigin="anonymous"></script>
</head>
<body>
  <h1>Funcionários da empresa X</h1>
  <p>A empresa conta com <?= count($funcionarios) ?> funcionários para este filtro</p>
  <form>
    <input type="text" placeholder="Digite a informação para busca" name="filtro" required value="<?= $_GET["filtro"] ?? '' ?>">
    <button>
      <i class="fas fa-search"></i>
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
      <th>Ações</th>
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
        <td class="actions" key="<?= $funcionario -> id ?>">
          <a id="update" href="./edit.php?id=<?= $funcionario -> id ?>"><i class="fas fa-user-edit"></i></a>
          <a id="delete" onclick="deleteUser(<?= $funcionario -> id ?>)"><i class="fas fa-trash"></i></i></button>
        </td>
      </tr>
    <?php
      endforeach;
    ?>
  </table>
  <div id="add__new">
    <p>+</p>
  </div>
  <div id="add__modal" class="container__modal">
      <div class="bg"></div>
      <div class="modal">
        <h2>Adição de novo funcionário</h2>
        <form action="./actions/create.php">
          <input type="text" name="first_name" required placeholder="Primeiro nome">
          <input type="text" name="last_name" required placeholder="Último nome">
          <input type="text" name="email" required placeholder="Email">
          <select name="gender" id="gender" required placeholder="Sexo">
            <option disabled selected value>Sexo</option>
            <option value="Male">Masculino</option>
            <option value="Female">Feminino</option>
          </select>
          <input type="text" name="ip_address" required placeholder="Endereço IP">
          <input type="text" name="country" required placeholder="País">
          <input type="text" name="department" required placeholder="Departamento">
          <div class="buttons">
            <button class="cancel" type="button">Cancelar</button>
            <button class="send">Adicionar</button>
          </div>
        </form>
      </div>
  </div>
</body>
</html>