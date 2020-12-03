<!DOCTYPE html>
<?php $thisPage="Home";
require_once 'bootstrap.php';
require_once 'php/Dao.php';
?>
<?php
session_start();
$dao = new Dao();
$featuredArticles = $dao->getFeaturedArticle();
?>

<html>

<head>
  <title>NILR: Home</title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
  <script type="text/javascript" src="./lib/jquery-3.3.1.min.js"></script>
  <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
</head>
<body>

<?php include 'header.php';?>


<div class="row" id="row123">

    <div class="card-home">
      <h2>Welcome to Night Of The Living Review!</h2>

      <p class="body-align"> Welcome to our website where we review all sorts of up and coming new horror related content and editorials. Hop on over to our forum section to talk with other users about your thoughts and opinions! </p>
    </div>
    <div class="card-home">
      <h2> Featured Articles </h2>

      <p class = "body-align"> Newest articles to check out! </p>
      <?php while($row = $featuredArticles->fetch()) { ?>
        <article class="article-post">  <h3> <a <?php echo "href=article-article.php?id=" . $row['id'];?>> <?php echo $row['title'] ?> 
      </h3><h5><?php echo $row['subtitle']; ?> </a> </h5>
      </article>
      <?php } ?>
  </div>
</div>

    <?php include 'footer.php';?>
    <script> 
    $(document).ready(function() {
      $('#row123').fadeIn(3000);
    });
    </script>
    </body>
