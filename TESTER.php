<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
      <section class="logoSection">
        <div class="container">
          <div class="row logoRow">
            <a href="."><img id="logo" src="images/websiteImages/anthea-middleton-logo.png" alt="Anthea Middleton" /></a>
          </div>
        </div>
      </section>
      <section class="navSection">
        <div class="container">
          <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li><a href="#">BLOG</a></li>
                  <li><a href="#">ABOUT</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </section>

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
                        <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
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
                        <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="contReading">Continue Reading...</a>
                        <div class="extraInfoWrap">
                          <div class="extraInfo">
                            <div class="dateInfo"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo date('m.d.y', $article->publicationDate)?></div>
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
                          <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
                        </h2>
                        <p class="summary"><?php echo htmlspecialchars( $article->summary )?>...</p>
                        <br>
                        <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="contReading">Continue Reading...</a>
                        <div class="extraInfoWrap">
                          <div class="extraInfo">
                            <div class="dateInfo"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo date('m.d.y', $article->publicationDate)?></div>
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
            <div class="col-md-4">

            </div>
          </div>
        </div>
      </section>

      <section class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div id="footer">
                Widget News &copy; 2011. All rights reserved. <a href="admin.php">Site Admin</a>
                      <p><a href="./?action=archive">Article Archive</a></p>
              </div>

            </div>
          </div>
        </div>
      </section>


      </body>
      </html>
