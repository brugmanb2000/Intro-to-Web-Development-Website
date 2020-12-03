<?php $_SESSION['lastLocation'] = "article-article.php?id=" . $articleID; ?>
<?php $_SESSION['id'] = $articleID; ?>
<div class="row">
  <div class="leftcolumn">
    <div class="card">

  <div class="comment-box" id="comments">
    <h3> Comments </h3>
    <?php 

    $comments = $dao->getComments($articleID);
    if ($comments->rowCount() == 0) {
      echo "No comments at this time. Why don't you leave the first comment?";
    } else { ?>
    <table> 
    <?php while($row = $comments->fetch()) { ?>
    <tr>
        <article class="article-post"> <p> <?php echo $row['username'] ?> on <?php echo $row['submit_date'] ?> : <br>
        <?php echo $row['content'] ?> <br>
    </tr>
    <?php }} ?>
    </table>
  </div>
  <hr>

  <?php if ($_SESSION['status'] == "loggedIn") { ?>
  <h3>Leave a Comment</h3>
  <form action="php/comment-handler.php" method="post" id="commentform">
  <label for="Username"> Posting as: <strong> <?php echo $_SESSION['user']; ?> </strong> </label>
  <br><br>
  <div>
    <label for="comment">Your message</label>
  </div>
  <div class = comment-box>
    <textarea name='content' required="required"></textarea>
  </div>
  <div class="comment-box">
    <input type="submit">
  </div>
</form>
 
</div>
</div>
</div>
</div>
<?php }  
else 
{
?> <p> Log in to leave a comment. Click <a href="LogIn.php"> here </a> to create your profile. </p> <?php }
?>
<script> 
    $(document).ready(function() {
      $('#comments').fadeIn(3000);
    });
    </script>