
<!DOCTYPE html>
<?php $thisPage="LogIn";
include 'php/Dao.php';
session_start();
$_SESSION['login'] = "";
$_SESSION["createLogin"] = "";
?>
<html>

<head>
  <title>NILR: Article Title</title>
  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<?php include 'header.php'; ?>

<?php if ($_SESSION['status'] != "loggedIn") { ?>
<h2> You currently are not logged in. Head to the log in page and log in! </h2>
<?php } ?>
<?php if ($_SESSION['status'] == "loggedIn") { 
$conn = new Dao();
$profile = $conn->getProfile($_SESSION['user']);
$s = $profile['dateCreated'];
$date = strtotime($s);

?>
<div class="profile-header">
  <div>
  <h2 class="left-align"> My Profile </h2>
  </div>
</div>

<div>
  



    <div class="card-profile">
    <p> User Info: </p>
    <p> <?php echo "Username: " . $_SESSION['user']; ?> </p>
    <p> <?php echo "Date joined: "; echo date('M-d-Y', $date); ?>
    <p> <?php echo "Bio: " . $profile['userBio']; ?>
  </div>
</div>

<div class="card-profile">
    <p>Update your bio </p>
    <form action="php/bio-updated.php" method="post">
      <textarea name="content" id="content" cols="30" rows="10"></textarea>
      <input type="submit" name='bio-editor' value='Submit'>
    </form>
  </div>

<?php if ($profile['authorPermissions'] == 1) { ?>
  <div class="card-profile">
    <p> Write an article for us </p>
    <form action="article-creator.php">
      <input type="submit" value='Submit'>
    </form>
  </div>
<?php } ?>


<div class="card-profile">
  <form action="php/loginhandler.php" method="post">
    <input type="submit" name="signout" value="Sign Out">
  </form>
</div>
</div>
<?php }
include 'footer.php'; 
?>

</body>
</html>
