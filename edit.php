<?php 
  require('./public/scripts/functions.php');

  if(!isset($_GET['id'])) {
    header("Location: ./error.php?error=O id do usuário não foi inserido");
  }

  $user = inserirInformacoes($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar funcionário</title>
  <link rel="stylesheet" href="./public/styles/global.css">
  <script src="https://kit.fontawesome.com/7cbb7ae6e7.js" crossorigin="anonymous"></script>
</head>
<body>
  <h2>Edição de funcionário</h2>
  <form action="./actions/update.php">
    <input id="input_id" type="hidden" name="input_id">
    <input id="first_name" type="text" name="first_name" required placeholder="Primeiro nome" value=<?= $user->first_name ?>>
    <input id="last_name" type="text" name="last_name" required placeholder="Último nome" value=<?= $user->last_name ?>>
    <input id="email" type="text" name="email" required placeholder="Email" value=<?= $user->email ?>>
    <select name="gender" id="gender" required placeholder="Sexo" value=<?= $user->gender ?>>
      <option value="Male" <?= $user->gender == 'Male' ? 'selected' : '' ?> >Masculino</option>
      <option value="Female" <?= $user->gender == 'Female' ? 'selected' : '' ?> >Feminino</option>
    </select>
    <input id="ip_address" type="text" name="ip_address" required placeholder="Endereço IP" value=<?= $user->ip_address ?>>
    <input id="country" type="text" name="country" required placeholder="País"  value=<?= $user->country ?>>
    <input id="department" type="text" name="department" required placeholder="Departamento" value=<?= $user->department ?>>
    <div class="buttons">
      <button id="update" class="cancel" type="button" onclick="window.history.back()"><i class="fas fa-window-close"></i></button>
      <button id="update" class="send"><i class="fas fa-user-edit"></i></button>
    </div>
  </form>
</body>
</html>