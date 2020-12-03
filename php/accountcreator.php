<?php
session_start();
require_once "Dao.php";

if (isset($_POST["submit-create"])) {
  $username = $_POST["username"];
  $password = $_POST["pass"];
  $_SESSION['createLogin'] = $username;
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);

  try {
   if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      throw new Exception("Password is not strong enough");
    }

    $dao = new Dao();
    $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
    $exists = $dao->doesUsernameExist($sanitizeUser);
    if ($exists == "true") {
      throw new Exception("Profile already exists");
    }
    
    $dao->createProfile($sanitizeUser, $password);
    if ($_SESSION["userCreationStatus"] == "failed") {
      throw new Exception("Invalid Username");
    }

    $user = $dao->getProfile($santizeUser);
    $_SESSION['dateCreated'] = $user['dateCreated'];
    $_SESSION['user']=$sanitizeUser;
    $_SESSION['status']="loggedIn";
    $_SESSION['loginStatus'] = "";
    header("Location: https://night-of-the-living-review1.herokuapp.com/profile.php");
  } catch (Exception $e) {
    $_SESSION["userCreationStatus"] = "failed";
    $_SESSION["userCreationError"] = $e->getMessage();
    $_SESSION['loginStatus'] = $e->getMessage();
    header("Location: https://night-of-the-living-review1.herokuapp.com/LogIn.php");
  }
}
?>
