<?php
  session_start();
  if(empty($_SESSION['username'])) {
    header("Location: ./index.php?error=Você não efetuou login ainda");
  }
  $username = $_SESSION['username'];
  $date = $_SESSION['date'];

  $error = $_GET['error'];
?>

<header>
  <h1>Área restrita</h1>
  <nav>
    <p><span>Username:</span> <?= $username ?></p>
    <p><span>Login efetuado em:</span> <?= $date ?></p>
    <a class="fas fa-sign-out-alt" href="./actions/auth.php?action=logout"></a>
  </nav>
</header>

<h1>Ocorreu um erro:</h1>
<p><?php echo $error; ?></p>
