<!DOCTYPE html>
<?php
session_start();
?>
<body>
  <div class="header-container">
  <a href="home.php"> <img class="logo" src="images/4.png" alt="Logo"> </a>



</div>
<div class="topnav">
<a class=<?php if ($thisPage=="Home")  { echo "active";} else { echo "inactive";} ?> href="home.php">Home</a>
<a class=<?php if ($thisPage=="Review") { echo "active";} else { echo "inactive";} ?> href="reviews.php">Reviews</a>
<a class=<?php if ($thisPage=="Editorials") { echo "active";} else { echo "inactive";} ?> href="editorials.php">Editorials</a>
<a class=<?php if ($thisPage=="Articles") { echo "active";} else { echo "inactive";} ?> href="all-articles.php">All Articles</a>
<a class=<?php if ($thisPage=="About") { echo "active";} else { echo "inactive";} ?> href="about.php">About</a>
<a class=<?php if ($thisPage=="LogIn") { echo "active";} else { echo "inactive";}?> href=<?php if ($_SESSION["status"]=="loggedIn") { echo "profile.php";} else { echo "LogIn.php";}?>> <?php if ($_SESSION["status"]=="loggedIn") { echo "My Profile";} else { echo "Log In";}?></a>

<div class="search-container">
  <form action="searchResults.php" method="GET">
    <input for="search" type="text" placeholder="Search.." name="searchValue">
    <button type="submit">Submit</button>
  </form>
</div>

</div>
</body>
