<?php include "include/header.php";
  $pathToUse = "/antheamiddleton/images/";
  $pageNumber = '1';
  $catPage = false;
  $catAll = false;
  if (isset($_GET['startPoint'])) {
    $pageNumber = $_GET['startPoint'];
  }
  if (isset($_GET['cat'])) {
    if ($_GET['cat'] == 'All') {
      $catAll = true;
    }
    $catPage = true;
  }
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="postList">
          <?php foreach ( $results['articles'] as $article ) {
            if ($article->image) {
              $imageVals  = $article->image;
              $imageSplit = explode(" ", $imageVals);
              if (sizeof($imageSplit) > 1) {
                $imagePath = $pathToUse . $imageSplit[0] . '/' . $imageSplit[1];
              }
              else {
                $imagePath = null;
              }
            }

            $dateFull = date('j M Y', $article->publicationDate);
            $dateFull = explode(" ", $dateFull);
            $day = $dateFull[0];
            $month = $dateFull[1];
            $year = $dateFull[2];
          ?>
          <?php if($article->image && $imagePath != null) :  ?>
            <li>
            <div class="row postListItem imgAndText">
              <div class="col-md-12">
                <h2>
                  <a href="<?php echo $extension ?>post/<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
                  <!-- <a href=".?action=post&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a> -->
                </h2>
              </div>
              <div class="col-md-4 postListImg">
                <div class="imgWithOverlay">
                  <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="test" />
                  <div class="overlayedText">
                    <div class="month"><?php echo $month ?></div>
                    <div class="dateDivider"></div>
                    <div class="day"><?php echo $day ?></div>
                    <div class="dateDivider"></div>
                    <div class="year"><?php echo $year ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 postListText">

                  <p class="summary"><?php echo htmlspecialchars( $article->summary )?>...</p>
                  <br>
                  <a href="post/<?php echo $article->id?>" class="contReading">Continue Reading...</a>
                  <!-- <a href=".?action=post&amp;articleId=<?php echo $article->id?>" class="contReading">Continue Reading...</a> -->
                  <div class="extraInfoWrap">
                    <div class="extraInfo">
                      <div class="dateInfo"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo date('d-m-y', $article->publicationDate)?></div>
                      <div class="tagsInfo"><p class="tags"><i class="fas fa-tags"></i>&nbsp;<?php echo htmlspecialchars( $article->tags )?></p></div>
                    </div>
                    <div class="catsInfo"><p class="categories"><span class="catsTitle">Categories:</span> <?php echo htmlspecialchars( $article->categories )?></p></div>
                  </div>
              </div>
            </div>
          <?php else : ?>
            <div class="row postListItem textOnly">
              <div class="col-md-12 postListText">

                  <h2>
                    <a href="<?php echo $extension ?>post/<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
                    <!-- <a href=".?action=post&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a> -->
                  </h2>
                  <p class="summary"><?php echo htmlspecialchars( $article->summary )?>...</p>
                  <br>
                  <a href="<?php echo $extension ?>post/<?php echo $article->id?>" class="contReading">Continue Reading...</a>
                  <div class="extraInfoWrap">
                    <div class="extraInfo">
                      <div class="dateInfo"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo date('d-m-y', $article->publicationDate)?></div>
                      <div class="tagsInfo"><p class="tags"><i class="fas fa-tags"></i>&nbsp;<?php echo htmlspecialchars( $article->tags )?></p></div>
                    </div>
                    <div class="catsInfo"><p class="categories"><span class="catsTitle">Categories:</span> <?php echo htmlspecialchars( $article->categories )?></p></div>
                  </div>
              </div>
            </div>
            </li>
          <?php endif; ?>

          <?php } ?>
        </ul>
      </div>
      <div class="col-md-4 RHSSection">
        <div class="links homeLinks">
          <h3>Links I Like</h3>
          <ul class="linkslist">
            <li><a href="https://ohmygsoh.wordpress.com/" target="_blank">Oh My Gsoh</a> - Blog about the perils of dating mingled with literary delight</li>
            <li><a href="https://keevaoshea.blogspot.com/" target="_blank">Keeva O'Shea</a> - Witty observations about travel, life and accidental gin festivals</li>
            <li><a href="http://eileenkeane.ie/blog/" target="_blank">Eileen Keane</a> - Blog by author and artist Eileen Keane</li>
            <li><a href="http://francesquinn.blogspot.com/" target="_blank">Flying Away from Reality</a> - Blog by Frances Quinn</li>
          </ul>
        </div>
        <div class="divider"></div>
        <div class="twitterTimeline">
          <h3>Sometimes I Tweet</h3>
          <p>Mostly I just retweet <a href="https://twitter.com/dog_feelings" target="_blank">@thoughsofdog</a> though, so you could just follow them.</p>
          <a href="https://twitter.com/antheamiddleton?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @antheamiddleton</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="divider"></div>
        <div class="dropdown cat-dropdown-div menu-dropdown-div">
          <h3>Filter Categories</h3>
          <p>Filter categories with the aptly named...</p>
          <a class="dropdown-toggle cat-dropdown-button" type="button" data-toggle="dropdown">Category Filter
          <span class="caret"></span></a>
          <ul class="dropdown-menu cat-dropdown">
            <?php foreach ( $newCatsUnique as $cat ) { ?>
              <li><a href="<?php echo $extension ?>category/<?php echo $cat ?>"><?php echo $cat ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div id="dom-target" style="display: none;">
          <?php echo htmlspecialchars($results['totalRows']);?>
      </div>
      <div id="dom-target2" style="display: none;">
          <?php echo htmlspecialchars($extension);?>
      </div>
      <div id="dom-target3" style="display: none;">
          <?php echo htmlspecialchars($pageNumber);?>
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


    </div>
  </div>
</section>
<?php if($catPage == false || $catAll == true) : ?>
  <section class="paginator hidePaginator">
    <div class="container">
      <div class="row">
        <div class="col-md-12 normalScreenSize">
          <ul class="paginatorUL">
            <li class="firstPageNum"><a href="<?php echo $extension ?>nav/page/1">1</a></li>
          </ul>
        </div>
        <div class="col-md-12 smallScreenSize">
          <div class="dropup cat-dropdown-div menu-dropdown-div">
            <a class="dropdown-toggle cat-dropdown-button" type="button" data-toggle="dropdown">Page Number
            <span class="caret"></span></a>
            <ul class="dropdown-menu cat-dropdown paginatorUL">
                <li class="firstPageNum"><a href="<?php echo $extension ?>nav/page/1">1</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>




<?php include "include/footer.php" ?>
