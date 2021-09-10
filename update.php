<?php 
  require('./functions.php');

  if(!isset($_GET['id'])) {
    header("Location: ./index.php");
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
</head>
<body>
  <h2>Edição de funcionário</h2>
  <form action="./index.php">
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
      <button class="cancel" type="button" action="actions.php">Cancelar</button>
      <button class="send">Confirmar edição</button>
    </div>
  </form>
</body>
</html>