<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/London" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=antheamiddleton" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 7 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
//define( "ADMIN_PASSWORD", "$2y$10$KfKIcQbd3/0x5VhLrnd3.OqNHO2udkrkLyUW3nFvKvOq/OnAVP32a" ); 
//TODO: Hash the password - "$2y$10$KfKIcQbd3/0x5VhLrnd3.OqNHO2udkrkLyUW3nFvKvOq/OnAVP32a"
require( CLASS_PATH . "/Article.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
