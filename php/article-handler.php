<?php

require_once "Dao.php";
session_start();
  $user = $_SESSION['user'];
  $title = $_POST['articleTitle'];
  $comment = $_POST["articleContent"];
  $subtitle = $_POST['subtitle'];
  $metaTag = $_POST['metaTag'];
  $title = htmlspecialchars($title);
  $content = htmlspecialchars($comment);
  $subtitle = htmlspecialchars($subtitle);
  $bio = htmlspecialchars($_POST['userBio']);
  $articleID = $_SESSION["id"];
  try {
    $dao = new Dao();
    $bio = $dao->getProfile($user)['userBio'];
    $dao->postArticle($title, $user, $metaTag, $content , $subtitle, $bio);
    header("Location: https://night-of-the-living-review1.herokuapp.com/article-article.php?id=" . $articleID);
    echo "USER: " . $user . "   Comment: " . $content . "   ArticleID: " . $articleID . "Return Value:   " . $retVal;
  } catch (Exception $e) {
    echo "Something goofed. Let's take a peak at the variables:";
    echo "USER: " . $user . "   Comment: " . $content . "   ArticleID: " . $articleID;
  }

  ?>
