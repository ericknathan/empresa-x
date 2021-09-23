<?php

  function readJson(string $filePath) {
    $file = file_get_contents($filePath);
    $jsonArray = json_decode($file);
    return $jsonArray;
  }

  function signIn($username, $password, $fileName) {
    $users = readJson($fileName);
    $logs = readJson('../data/log.json');

    foreach ($users as $user) {
      if($user->username == $username && $user->password == $password) {
        $_SESSION['username'] = $user->username;
        $_SESSION['id'] = session_id();
        $_SESSION['date'] = date('d/m/Y - h:i:s');

        $date = date('d-m-Y');
        $logs->$date[] = [
          'type' => 'login',
          'username' => $user->username,
          'session_id' => session_id(),
          'time' => date('h:i:s')
        ];
        file_put_contents('../data/log.json', json_encode($logs));

        header('location: ../area_restrita.php');
        return;
      }
    }
    return header('location: ../index.php?error=Usuário ou senha inválidos');
  }

  function signOut() {
    $logs = readJson('../data/log.json');
    $date = date('d-m-Y');
    $logs->$date[] = [
      'type' => 'logout',
      'username' => $_SESSION['username'],
      'session_id' => session_id(),
      'time' => date('h:i:s')
    ];
    file_put_contents('../data/log.json', json_encode($logs));
    session_destroy();
    header('location: ../index.php');
  }