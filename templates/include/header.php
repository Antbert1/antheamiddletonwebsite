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

    <?php if(isset($_GET['articleId'])) {
      $isPost = TRUE;
    }
    else {
      $isPost = FALSE;
    }?>

    <?php if ($isPost == TRUE): ?>
      <section class="logoSection postLogoSection">
    <?php else: ?>
      <section class="logoSection">
    <?php endif ?>
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
