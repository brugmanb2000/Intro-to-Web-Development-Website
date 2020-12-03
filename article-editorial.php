
<!DOCTYPE html>
<?php $thisPage="Editorials"; 
require_once 'php/Dao.php';
$articleID = $_GET['id'];
$dao = new Dao();
$article = $dao->getArticle($articleID);
?>
<html>

<head>
  <title>NILR: <?php echo $article['title']; ?></title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<?php include 'header.php';?>

<?php include 'article.php';?>

<?php include 'comments.php';?>

<?php include 'footer.php';?>
    </body>
