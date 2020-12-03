<?php 
$dao = new Dao();
$featuredArticles = $dao->getFeaturedArticle();
?>

<div class="row-fade" id="row-fade">

  <div class="leftcolumn">

    <div class="card" id="article">
     <h2> <?php echo $article['title']; ?> </h2>
      <h5><?php echo $article['subtitle']; ?> </h5>
        <?php echo $article['body']; ?>

    </div>

  </div>

  <div class="rightcolumn">
    <div class="card">
      <h2><?php echo $article['name']?></h2>
      <p><?php echo $article['bio']?></p>
    </div>

    <div class="card">
      <h3>Popular Posts</h3>
      <?php while($row = $featuredArticles->fetch()) { ?>
        <article class="article-post">  <h3> <a <?php echo "href=article-article.php?id=" . $row['id'];?>> <?php echo $row['title'] ?> 
      </h3><h5> by <?php echo $row['name']; ?> </a> </h5>
      </article> 
      <?php } ?>
    </div>
  </div>
</div>


<script> 

    $(document).ready(function() {
      $('#row-fade').fadeIn(3000);
    });
    </script>