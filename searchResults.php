<!DOCTYPE html>
<?php $thisPage="Search"; 
require_once 'php/Dao.php';
$articleNameValue = $_GET['searchValue'];
$dao = new Dao();
$conn = $dao->getConnection();
$articles = $conn->prepare("Select * from article left join author on article.authorID = author.id where title like ?;");
$articles->execute(array("%" . $articleNameValue . "%"));
?>
<html>

<head>
  <title>NILR: Search Results</title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<?php include 'header.php';?>
<div class="center-align">
<h3> Based on your search results, these are the articles we've found! <h3>
</div>
<div class="center-align">
<p> You searched for <?php echo $articleNameValue?>. <p>
</div> 
<div class="card">

<?php if ($articles->rowCount() == 0) {
      echo "What do your search results and the way out of the creepy mansion have in common? They both cannot be found. Try searching again!";
    } else {
        while($row = $articles->fetch()) { ?>
    <tr>
        <article class="article-post"> <h3> <a <?php echo "href=article-article.php?id=" . $row['id'];?>> <?php echo $row['title']; ?>
        <h4> <?php echo "By " . $row['name'] ?> </h4> </a>
        </article>
    </tr>
    <?php }} ?>
</div>
<?php include 'footer.php';?>
    </body>
