<?php

require_once "Dao.php";

if (isset($_POST["submit-create"])) {
  $username = $_POST["username"];
  $password = $_POST["pass"];
  echo $_POST["username"];
  try {
    $dao = new Dao();
    $dao->createProfile($username, $password);
  } catch (Excepetion $e) {
    var_dump($e);
    die;
  }
}
header(index.php);
?>