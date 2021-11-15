<?php
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username ,email , passwords) VALUES ('$user', '$email', '$hashed');";
    $result = mysqli_query($db, $query);
    if ($result) {
      header("Location: ./");
    } else {
      header("Location: ./?action=addUser&error=1");
    }
?>