<?php

  if(!empty($_POST)){
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = $db->prepare("INSERT INTO users (username ,email , passwords) VALUES (?, ?, ?);");
    $query->bind_param("sss", $user, $email, $hashed);
    $result = $query->execute();

    if ($result) {
      header("Location: ./?action=loginUser");
    } else {
      header("Location: ./?action=addUser&error=1");
    }
  }
  else{
    print("Access Denied");
    exit();
  }
?>