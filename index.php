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
    viewListSection();
    break;
  default:
    homepage();
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
  $results['comments'] = Comment::getListForPost( (int)$_GET["articleId"] )['results'];
  $results['pageTitle'] = $results['article']->title . " | Anthea Middleton";
  //echo sizeof($results['comments']);
  require( TEMPLATE_PATH . "/viewArticle.php" );
}

function viewListSection() {
//   foreach($_GET as $key => $value)
// {
//    echo 'Key = ' . $key . '<br />';
//    echo 'Value= ' . $value;
// }
  $startPoint = $_GET["startPoint"];
  $results = array();
  $data = Article::getListSection( $startPoint, HOMEPAGE_NUM_ARTICLES );
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
