<!DOCTYPE html>
<body>
  <div class="header-container">
  <a href="home.php"> <img class="logo" src="images/4.png" alt="Logo"> </a>

<?php
$loggedIn = false;
?>


</div>
<div class="topnav">
<a class=<?php if ($thisPage=="Home")  { echo "active";} else { echo "inactive";} ?> href="home.php">Home</a>
<a class=<?php if ($thisPage=="Review") { echo "active";} else { echo "inactive";} ?> href="reviews.php">Reviews</a>
<a class=<?php if ($thisPage=="Editorial") { echo "active";} else { echo "inactive";} ?> href="editorials.php">Editorials</a>
<a class=<?php if ($thisPage=="Forum") { echo "active";} else { echo "inactive";} ?> href="forum.php">Forums</a>
<a class=<?php if ($thisPage=="About") { echo "active";} else { echo "inactive";} ?> href="about.php">About</a>
<a class=<?php if ($thisPage=="LogIn") { echo "active";} else { echo "inactive";}?> href="LogIn.php">Log In</a>
<div class="search-container">
  <form action="/action_page.php">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit">Submit</button>
  </form>
</div>
</div>
<div class="favicon-row">
<a href="https://www.facebook.com"> <img class="favicon" src="https://img.icons8.com/officel/2x/facebook-new.png" alt="facebook icon"></a>
<a href="https://www.twitter.com"> <img class="favicon" src="https://www.iconfinder.com/data/icons/company-identity/100/new-twitter-logo-vector-512.png" alt="twitter icon"></a>
<a href="https://www.youtube.com"> <img class="favicon" src="https://icons.iconarchive.com/icons/graphics-vibe/classic-3d-social/256/youtube-icon.png" alt="youtube favicon"></a>
<a href="https://www.instagram.com"> <img class="favicon" src="https://www.flaticon.com/svg/static/icons/svg/1409/1409946.svg" alt="instagram icon"></a>
<br><br>
</div>

</body>
