<!DOCTYPE html>
<?php $thisPage="LogIn";
require_once 'php/Dao.php';
session_start();
$dao = new Dao();
$profile = $dao->getProfile($_SESSION['user']);
?>
<html>

<head>
  <title>NILR: Article Writer</title>
  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<?php include 'header.php'; ?>

<?php if ($profile['authorPermissions'] != 1) { ?>
<h2> Ahh! It looks like you don't have the requisite permissions to be here!</h2>
<?php } ?>
<?php if ($profile['authorPermissions'] == 1) { ?>
<div class="profile-header">
  <div class="card-profile">
    <form action="php/article-handler.php" type="POST">
    <h4> Write your article below and submit when finished! </h4>
    <?php echo "<strong> Writing as user: " . $_SESSION['user'] . "</strong>"; ?> <br><br> 
    <label> Give your article a title </label> <br>
    <textarea name='article-title' id = "article-title" rows = "1" cols = "10" required> Title of your masterpiece </textarea> <br>
    <label> Type your article here: </label> <br>
    <textarea name='article-content' id = "article-content" rows = "40" cols = "50" required> Write your masterpiece here =) </textarea> <br>
    <label> Type your article here: </label> <br>
    <textarea name='article-subtitle' id = "article-subtitle" rows = "3" cols = "10" required> Title of your masterpiece </textarea> <br>   
    <input type="radio" id="Editorial" name="article-type" value="Editorial">
      <label for="Editorial">Editorial</label><br>
      <input type="radio" id="Review" name="article-type" value="Review">
      <label for="Review">Review</label><br>
    <input type="submit" value="Submit">
</div>
</div>
</form>
<?php }
include 'footer.php'; 
?>

</body>
</html>
