<!DOCTYPE html>

<?php
if(isset($_GET['articleId'])) {
  $isPost = TRUE;
}
else {
  $isPost = FALSE;
}
?>
<!--Because of redirects, we need to change the extensions on different files-->
<?php
$isCat = FALSE;
if(isset($_GET['articleId'])) {

  $isPost = TRUE;
  $isPage = FALSE;
  if ($_GET['action'] == 'post') {
    $extension = '../';
  }
  else {
    $extension = '';
  }
  if ($results['article']->image) {
    $imageVals  = $results['article']->image;
    $imageSplit = explode(" ", $imageVals);
    if (sizeof($imageSplit) > 1) {
      $imagePath = $imageSplit[0] . '/' . $imageSplit[1];
    }
    else {
      $imagePath = null;
    }
  }
}

elseif (isset($_GET['startPoint'])){
  $isPage = TRUE;
  $isPost = FALSE;
  if ($_GET['action'] == 'page') {
    $extension = '../../';
  }
  else {
    $extension = '';
  }
}

elseif (isset($_GET['category'])) {
  $isPage = FALSE;
  $isCat = TRUE;
  $extension = '../';
}

else {
  $isPage = FALSE;
  $isPost = FALSE;
  $extension = '';
}

?>

<html lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $extension ?>style.css" />
    <?php if ($isPost == TRUE): ?>
      <meta property="og:url" content="http://www.antheamiddleton.com/post/<?php echo $_GET['articleId']?>" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="Anthea Middleton" />
      <meta property="og:description" content="<?php echo $results['article']->summary ?>" />
      <?php if ($imagePath !== null): ?>
        <meta property="og:image" content="http://localhost/antheamiddleton/images/<?php echo $imagePath ?>" />
      <?php endif ?>


    <?php endif ?>
  </head>
  <body>


    <?php if ($isPost == TRUE || $isPage == TRUE): ?>
      <section class="logoSection postLogoSection">
    <?php else: ?>
      <section class="logoSection">
    <?php endif ?>
        <div class="container">
          <div class="row logoRow">
            <?php if ($isPost == TRUE || $isCat == TRUE): ?>
              <a href="../"><img id="logo" src="<?php echo $extension ?>images/websiteImages/anthea-middleton-logo.png" alt="Anthea Middleton" /></a>
            <?php elseif ($isPage == TRUE): ?>
              <a href="../../"><img id="logo" src="<?php echo $extension ?>images/websiteImages/anthea-middleton-logo.png" alt="Anthea Middleton" /></a>
            <?php else: ?>
              <a href="./"><img id="logo" src="<?php echo $extension ?>images/websiteImages/anthea-middleton-logo.png" alt="Anthea Middleton" /></a>
            <?php endif ?>
          </div>
        </div>
      </section>
      <section class="navSection">
        <div class="container">
          <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li>
                    <?php if ($isPost == TRUE || $isCat == TRUE): ?>
                      <a href="../">BLOG</a>
                    <?php elseif ($isPage == TRUE): ?>
                      <a href="../../">BLOG</a>
                    <?php else: ?>
                      <a href="./">BLOG</a>
                    <?php endif ?>
                  </li>
                  <li>
                    <?php if ($isPost == TRUE || $isCat == TRUE): ?>
                      <a href="../about">ABOUT</a>
                    <?php elseif ($isPage == TRUE): ?>
                      <a href="../../about">ABOUT</a>
                    <?php else: ?>
                      <a href="./about">ABOUT</a>
                    <?php endif ?>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </section>
