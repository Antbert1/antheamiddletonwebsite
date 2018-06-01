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
      <div class="col-md-8">
        <?php echo $results['article']->content?>

        <div class="row commentSection">
          <form name="contactform" method="post" action="../comment.php?postID=<?php echo $results['article']->id?>">
            <div class="messages"></div>
            <div class="controls">

              <div class="form-group">
                <label for="userName">Name</label>
                <input id="form_name" type="text" name="userName" maxlength="50" size="30" class="form-control" placeholder="Enter your name *" required="required" data-error="Firstname is required.">
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <label for="content">Comment</label>
                <textarea id="form_message" name="content" maxlength="1000" cols="25" rows="6" class="form-control" placeholder="Type message here *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                <div class="help-block with-errors"></div>
              </div>
    <!--
              <div class="g-recaptcha" data-sitekey="6LfjePkSAAAAALAHmBmSN1B2EO_qtDAOskpliwTJ"></div> -->
            <input type="submit" class="btn btn-success btn-send" value="Submit">
          </form>
        </div>
    </div>

    </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <p><a href="../">Return to Homepage</a></p>
      </div>
    </div>
  </div>

  <div id="imagePopup" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <img class="modalImage" src="">
        </div>
      </div>

    </div>
  </div>
</section>


<?php include "include/footer.php" ?>
