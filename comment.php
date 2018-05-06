

<?php
require( "config.php" );

$postID = $_GET['postID'];
//   foreach($_GET as $key => $value)
//  {
//    echo 'Key = ' . $key . '<br />';
//     echo 'Value= ' . $value;
//  }
//
//  foreach($_POST as $key => $value)
// {
//   echo 'Key = ' . $key . '<br />';
//    echo 'Value= ' . $value;
// }

$commentVals = $_POST;
$commentVals['postID'] = $postID;
$commentVals['published'] = 'FALSE';
$commentVals['publicationDate'] = date("Y-m-d");

 //  foreach($commentVals as $key => $value)
 // {
 //   echo 'Key = ' . $key . '<br />';
 //    echo 'Value= ' . $value;
 // }

newComment($commentVals);

function newComment($commentVals) {

  // $results = array();
  // $results['pageTitle'] = "New Article";
  // $results['formAction'] = "newArticle";
  //
  // if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $comment = new Comment;
    $comment->storeFormValues( $commentVals );
    $comment->insert();

  // } elseif ( isset( $_POST['cancel'] ) ) {
  //
  //   // User has cancelled their edits: return to the article list
  //   header( "Location: admin.php" );
  // } else {
  //
  //   // User has not posted the article edit form yet: display the form
  //   $results['article'] = new Article;
  //   require( TEMPLATE_PATH . "/admin/editArticle.php" );
  // }

}



//header("Location: post/". $postID."?comment=1");

 ?>
