
<!DOCTYPE html>
<?php $thisPage="Review"; 
require_once 'php/Dao.php'; ?>
<html>

<head>
  <title>NILR: Reviews</title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
 
<?php include 'header.php';

$dao = new Dao();
$conn = $dao->getConnection();
$stmt = $conn->query("SELECT * from article where metatag like 'review' order by ID desc limit 15;'");
?>

<article class="articles-fade" id="articleList">
  <h1>Reviews</h1>

  <?php while($row = $stmt->fetch()) { ?>
   <article class="article-post" id="article">
    <h4> <a <?php echo "href=article-review.php?id=" . $row['id'];?>> <?php echo $row['title'] ?></a> </h4>
    <p>  <?php echo $row['subtitle']; ?> </p>

    </article>
    <?php } ?>

</article>
<?php include 'footer.php';?>
<script> 
    $(document).ready(function() {
      $('#articleList').fadeIn(3000);
    });
    </script>
  </body>