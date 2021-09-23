<?php
    $error = $_GET['error'] ?? '';
    session_start();
    if(isset($_SESSION['username']) && $error == '') {
        header('Location: area_restrita.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/styles/login.css">
    <title>SESSÕES NO PHP</title>
</head>
<body>
    <div class="container-geral center">
        <div class="container-form center">
                <form action="./actions/auth.php?action=login" method="POST">
                    <h1 class="text-center">LOGIN</h1>
                    <div class="form-group">
                        <label class="m-0 mt-1" for="username">Usuário</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="username" id="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="m-0 mt-1" for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button class="btn btn-primary w-100 mt-2" type="submit">LOGAR</button>
                    <?php if(!empty($error)) echo "<p class='alert alert-danger text-center mb-0 mt-3' role='alert'>$error</p>" ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>