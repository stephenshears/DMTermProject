<?php
    $user = "";
    $pass = "";
    $validated = false;

    if (isset($_SESSION['status']))
    {
      header("Location: main.php");
    }

    if ($_POST)
    {
      $user = $_POST['username'];
      $password = $_POST['password'];

      $query = "SELECT * FROM users WHERE username = '$user'";
      $result = mysqli_query($db, $query);

      $info = mysqli_fetch_assoc($result);
      if(password_verify($password, $info['passwords']))
      {
        $_SESSION['status'] = 1;
        $_SESSION['id'] = $info['userID'];
        $_SESSION['user'] = $user;

        $listQuery = "SELECT * FROM userlist WHERE userID = " . $_SESSION['id'];
        $listResult = mysqli_query($db, $listQuery);

        if ($listResult)
            {
              $_SESSION['movieList'] = array();
              while($row = mysqli_fetch_array($listResult))
              {
                $_SESSION['movieList'][] = $row['movieID'];
              }
            }
            else
            {
                printf("Error: %s\n");
            }


        header("Location: ./?action=main.php");
      }
      else
      {
        header("Location: ./?action=loginUser&error=1");
      }
    }
?>