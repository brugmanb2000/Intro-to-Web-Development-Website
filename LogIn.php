<?php $thisPage="LogIn"; ?>
<html>

<head>
  <title>NILR: Log In</title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<?php include 'header.php';?>

  <div class="about-header">
  <div class = "card-about-me">

    
    <h3> Sign In </h3>
    <form action="php/loginhandler.php" method="post">
      Username: <input name='username' /><br>
      Password: <input name='pass' /><br>
      <input type="submit" name="submit-login" value="Log In"/>
    </form>
    <hr>


    <h3> Create an Account </h3>
    <form action="php/accountcreator.php" method="post">
      Username: <input name='username' /><br>
      Password: <input name='pass' /><br>
      <input type="submit" name="submit-create" value="Create Account"/>
    </form>
</div>
</div>

<?php include 'footer.php';?>
</body>
