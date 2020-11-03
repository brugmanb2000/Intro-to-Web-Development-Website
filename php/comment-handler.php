<?php

require_once "Dao.php";

if (isset($_POST["commentButton"])) {
  $comment = $_POST["comment"];

  try {
    $dao = new Dao();
    $dao->saveComment($comment);
  } catch (Excepetion $e) {
    var_dump($e);
    die;
  }
}
header(index.php)
