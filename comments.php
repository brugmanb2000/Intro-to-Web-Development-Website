<!DOCTYPE html>
<div class="comment-container">
  <h3>Leave a Comment</h3>
  <form action="post_comment.php" method="post" id="commentform">

    <div>
    <label for="comment_author" class="required">Your name</label>
  </div>
  <div class = comment-box>
    <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
  </div>

  <div>
    <label for="comment" class="required">Your message</label>
  </div>
  <div class = comment-box>
    <textarea required="required"></textarea>
  </div>

    <!-- comment_post_ID value hard-coded as 1 -->
    <div class="comment-box">
    <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
    <input name="submit" type="submit" value="Submit comment" />
  </div>
  <hr>
  <div class="comment-box">
    <h3> Comments </h3>
    <p> Name: comment </p>
    <p> Name: comment </p>
    <p> Name: comment </p>
  </div>
    <hr>
</div>
