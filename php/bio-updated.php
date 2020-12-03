<?php

require_once "Dao.php";
session_start();
  $user = $_SESSION['user'];
  $comment = $_POST["content"];
  $content = htmlspecialchars($comment);
  try {
    $dao = new Dao();
    $dao->updateBio($user, $content);
    header("Location : https://night-of-the-living-review1.herokuapp.com/profile.php");
    echo "USER: " . $user . "   Comment: " . $content;
  } catch (Exception $e) {
    echo "Something goofed. Let's take a peak at the variables:";
    echo "USER: " . $user . "   Comment: " . $content . "   ArticleID: " . $articleID;
  }

  ?>
