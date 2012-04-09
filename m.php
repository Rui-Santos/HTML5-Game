<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
if ( !function_exists( 'tryDef' ) ) {
    function tryDef( $name, $val ) {
        if ( defined( $name ) ) return false;
        define( $name, $val );
    }
}
require_once( ROOT.'/config.php' );
mysql_connect( MYSQL_HOST, MYSQL_USER, MYSQL_PASS ) or die( 'Failed to connect to MySQL server. Please edit config.php<br />Official MySQL error: '.mysql_error(  ) );
mysql_select_db( MYSQL_DB ) or die( 'Failed to select MySQL DB. Please edit config.php<br />Official MySQL error: '.mysql_error(  ) );
$tableExists = mysql_query( 'SHOW TABLES LIKE "'.MYSQL_TABLE_NAME.'"' ) or die( 'fail'.mysql_error() );
if ( !mysql_num_rows( $tableExists ) ) {
    // The table doesn't exist, so we will have to create it.
    mysql_query( 'CREATE TABLE '.MYSQL_TABLE_NAME.' ( `id` int(15) NOT NULL AUTO_INCREMENT COMMENT \'This is the ID associated with the clear text\', `data` longtext NOT NULL COMMENT \'This is the actual clear text\', PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1' ) or die( 'Couldn\'t create the MySQL Table.<br />Official error: '.mysql_error() );
}

function showTop( $p=1 ) {
    echo '<!doctype html><html class="no-js" lang="en"><head>';
    echo '<title>Crypto Game</title>';
    echo '<meta name="description" content="">';
    echo '<meta name="author" content="James Costian">';
    echo '<meta charset="utf-8"><meta name="viewport" content="width=device-width"><link rel="stylesheet" href="'.HOME_URL.'/'.( is_file( ROOT.'/gen/min.css' )?'gen/min.css':'css/' ).'"><!--[if lt IE 9]><script src="'.HOME_URL.'/js/html5.js"></script><![endif]--></head><body>';
    echo '<div class="navbar navbar-fixed-top">';
    echo '<div class="navbar-inner"><div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>';
    echo '<a class="brand" href="'.HOME_URL.'/play/random">Crypto Game</a>';
    echo '<div class="nav-collapse"><ul class="nav">';
    echo '<li'.( $p==1?' class="active"':'' ).'><a href="'.HOME_URL.'">Game</a></li>';
    echo '<li'.( $p==2?' class="active"':'' ).'><a href="'.HOME_URL.'/add.php">Add</a></li>';
    echo '<li'.( $p==3?' class="active"':'' ).'><a href="'.HOME_URL.'/rules.php">Rules</a></li>';
    echo '</ul></div></div></div></div><div class="container">';
}
function showBottom(  ) {
    echo '</div>';
    if ( is_file( ROOT.'/gen/min.js' ) ) echo '<script src="'.HOME_URL.'/gen/min.js">';
    else echo '<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script><script src="'.HOME_URL.'/js/modernizr.js"></script><script src="'.HOME_URL.'/js/bootstrap.min.js"></script><script src="'.HOME_URL.'/js/"></script>';
    echo '</body></html>';
    exit(  );
}
?>