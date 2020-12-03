<?php $thisPage="LogIn"; ?>
<?php
session_start();
?>

<html>

<head>
  <title>NILR: Log In</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<?php include 'header.php';?>

  <div class="about-header">
  <?php if ($_SESSION['loginStatus'] != "") {
        echo "<div class='card-about-me'> "; echo $_SESSION['loginStatus']; echo '</div>';
      } ?>
  <div class = "card-about-me">

    <h3> Sign In </h3>
    <form action="php/loginhandler.php" name="signin" method="post" onsubmit="return validateForm()">
      <p class="no=margin">Username:
    </p>
      <input type='text' name='username' for='username'  required="required" value=<?php echo $_SESSION["loginUsername"] ?>><br>
      <p class="no=margin">Password:</p> 
      <input type='password' name='pass' for='password' minlength="7" required="required" /><br><br>
    </p>
      <div>
      <input type="submit" name="submit-login" value="Log In"/>
    </div>
    </form>

    <hr>

    <h3> Create an Account </h3>
    <form class='validate' action="php/accountcreator.php" id='createAccount' name="login" method="post">
     <p> 
       <p for="username" class="no-margin">Username:</p>
       <input type='text' class='validate' id='username' name='username' for='username' required="required" value=<?php echo $_SESSION["createLogin"] ?>>
    </p>
    <p>
       <p class="no-margin">Password:</p> 
       <input type='password' class='validate' id='pass' name='pass' for='password' minlength="7" required="required"/><br>
    </p>  
      </p>


   <br><br>

      <input type="submit" name="submit-create" value="Create Account"/>
    </form>
</div>
</div>
<?php include 'footer.php';?>

<script>
$(document).ready(function() {
$("#createAccount").validate({
rules: {
  username : {
    required: true,
    minlength: 5
  },
  pass : {
    required: true,
    minlength: 7
  }
}
});
});
</script>
</body>
