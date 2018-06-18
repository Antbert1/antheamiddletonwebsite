

<?php
require( "config.php" );

$postID = $_GET['postID'];

$commentVals = $_POST;
$commentVals['postID'] = $postID;
$commentVals['published'] = 'FALSE';
$commentVals['publicationDate'] = date("Y-m-d");

newComment($commentVals);

function newComment($commentVals) {
    // User has posted the article edit form: save the new article
    $comment = new Comment;
    $comment->storeFormValues( $commentVals );
    $comment->insert();

}



header("Location: post/". $postID."?comment=1#commentAnchor");

 ?>
