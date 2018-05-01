<?php


require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'post':
    viewArticle();
    break;
  case 'page':
    echo $action;
  default:
    homepage();
    echo "Default happening";
}


function archive() {
  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Article Archive | Anthea Middleton";
  require( TEMPLATE_PATH . "/archive.php" );
}

function viewArticle() {
  if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['article'] = Article::getById( (int)$_GET["articleId"] );
  $results['pageTitle'] = $results['article']->title . " | Anthea Middleton";
  require( TEMPLATE_PATH . "/viewArticle.php" );
}

function viewListSection() {
  $startPoint = $_GET["startPoint"];
  $results = array();
  $data = Article::getList( $startPoint, HOMEPAGE_NUM_ARTICLES );
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Anthea Middleton";
  require( TEMPLATE_PATH . "/homepage.php" );
}

function homepage() {
  $results = array();
  $data = Article::getList( HOMEPAGE_NUM_ARTICLES );
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Anthea Middleton";
  require( TEMPLATE_PATH . "/homepage.php" );
}

?>
