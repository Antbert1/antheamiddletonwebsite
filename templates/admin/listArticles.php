<?php include "/antheamiddleton/templates/include/header.php" ?>


<section>
    <div class="container">
      <div class="row adminHeaderRow">
        <div class="col-md-12">
          <div id="adminHeader">
            <h2>Admin Panel</h2>
            <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h1>All Posts</h1>

          <?php if ( isset( $results['errorMessage'] ) ) { ?>
            <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
          <?php } ?>


          <?php if ( isset( $results['statusMessage'] ) ) { ?>
            <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
          <?php } ?>

          <div class="tableDiv">
            <table>
              <tr>
                <th>Publication Date</th>
                <th>Article</th>
              </tr>

      <?php foreach ( $results['articles'] as $article ) { ?>
              <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
                  <td><?php echo date('j M Y', $article->publicationDate)?></td>
                <td>
                  <?php echo $article->title?>
                </td>
              </tr>

      <?php } ?>

            </table>
          </div>
        </div>

        <div class="col-md-6">
          <h2>Comments</h2>
          <div class="tableDiv">
            <div class="row commentLine commentLineHeading">
              <div class="col-md-3 commentItem">Publication Date</div>
              <div class="col-md-3 commentItem">Name</div>
              <div class="col-md-5 commentItem">Content</div>
              <div class="col-md-1 commentItem">D?</div>
            </div>
            <?php foreach ( $results['comments'] as $comment ) { ?>
              <?php
                $truncatedContent =  substr($comment->content, 0, 30)."...";
              ?>
              <div class="row commentLine">
                <div class="col-md-3 commentItem">
                  <?php echo date('j M Y', $comment->publicationDate)?>
                </div>
                <div class="col-md-3 commentItem">
                  <?php echo $comment->userName?>
                </div>
                <div class="col-md-5 commentItem">
                  <?php echo $truncatedContent?>
                </div>
                <div class="col-md-1 commentItem">
                  <div class="checkbox">
                    <?php if ( $comment->published == 0 ): ?>
                      <a href="#"><i class="far fa-square notShown commentTickbox"></i></a>
                    <!-- <label><input type="checkbox" value="" onclick="toggleCheck(<?php echo $comment->id ?>, this)"></label> -->
                    <?php else : ?>
                      <a href="#"><i class="far fa-check-square shown commentTickbox"></i></a>
                      <!-- <label class="active"><input type="checkbox" value="" checked="checked" onclick="toggleCheck(this)"></label> -->
                    <?php endif; ?>
                  </div>

                </div>
              </div>

            <?php } ?>
          </div>
        </div>
      </div>



      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a href="admin.php?action=newArticle">Add a New Article</a></p>
    </div>
  </section>

<?php include "/antheamiddleton/templates/include/footer.php" ?>
