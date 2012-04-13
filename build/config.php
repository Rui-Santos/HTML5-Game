<?php
global $profanity;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
tryDef( 'HOME_URL', 'http://localhost/git/HTML5-Game/build' );
tryDef( 'MYSQL_HOST', 'localhost' );
tryDef( 'MYSQL_USER', 'crypto' );
tryDef( 'MYSQL_PASS', '' );
tryDef( 'MYSQL_DB', 'test' );
tryDef( 'MYSQL_TABLE_NAME', 'crypto_game' );
$profanity = array(
    // Put words you want censored here
);
?>