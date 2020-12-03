<?php

require_once "Dao.php";
session_start();
  $user = $_SESSION['user'];
  $comment = $_POST["content"];
  $content = htmlspecialchars($comment);
  $articleID = $_SESSION["id"];
  try {
    $dao = new Dao();
    $dao->saveComment($user, $content, $articleID);
    header("Location: https://night-of-the-living-review1.herokuapp.com/article-article.php?id=" . $articleID);
  } catch (Exception $e) {
    echo "Something goofed. Let's take a peak at the variables:";
    echo "USER: " . $user . "   Comment: " . $content . "   ArticleID: " . $articleID;
  }

  ?>
