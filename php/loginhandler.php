<?php

require_once "Dao.php";
session_start();

if (isset($_POST["submit-login"])) {
  $username = $_POST["username"];
  $password = $_POST["pass"];
  $_SESSION["loginUsername"] = $username;


  try {
    $dao = new Dao();
    $exists = $dao->doesProfileExist($username, $password);
    
    $userInfo = $dao->getProfile($username);

    if ($exists == "true") {
      $_SESSION["creationDate"] = $userInfo['dateCreated'];
      $_SESSION["status"] = "loggedIn";
      $_SESSION["user"] = $username;
      $_SESSION['loginStatus'] = "";
      header("Location: https://night-of-the-living-review1.herokuapp.com/profile.php");
    }
    else
    {
      echo "no match found";
      $_SESSION['loginStatus'] = "Incorrect username/password";
      header("Location: https://night-of-the-living-review1.herokuapp.com/LogIn.php");
    }

  } catch (Exception $e) {
    $_SESSION['loginStatus'] = $e->getMessage();
    header("Location: https://night-of-the-living-review1.herokuapp.com/500error.php");
  }
}

if (isset($_POST['signout'])) {
  session_start();
  $_SESSION['user'] = "null";
  $_SESSION['status'] = "loggedOut";
  session_unset();
  session_destroy();
  header("Location: https://night-of-the-living-review1.herokuapp.com/home.php");
}
?>
