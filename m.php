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
if ( !mysql_num_rows( mysql_query( 'SHOW TABLES LIKE "'.MYSQL_TABLE_NAME.'"' ) ) ) {
    // The table doesn't exist, so we will have to create it.
    mysql_query( 'CREATE TABLE '.MYSQL_TABLE_NAME.' ( `id` int(15) NOT NULL AUTO_INCREMENT COMMENT \'This is the ID associated with the clear text\', `data` longtext NOT NULL COMMENT \'This is the actual clear text\', PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1' );
}
?>