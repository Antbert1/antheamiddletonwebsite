<?php include "include/header.php";
?>

<section class="blogPost">
  <div class="container">
    <div class="row postTitle">
      <div class="col-md-12">
        <h1><?php echo htmlspecialchars( $results['article']->title )?></h1>
        <div class="postInfo">
          <div class="pubDate postInfoDiv"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo date('j F Y', $results['article']->publicationDate)?></div>
          <div class="commentOption postInfoDiv"><i class="far fa-comment"></i>&nbsp;Leave a Comment</div>
          <div class"catList postInfoDiv"><i class="far fa-folder-open"></i>&nbsp;<?php echo $results['article']->categories?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8"><?php echo $results['article']->content?></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <p><a href="../">Return to Homepage</a></p>
      </div>
    </div>
  </div>
</section>


<?php include "include/footer.php" ?>
