<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
if ( !isset( $_GET[ 'id' ] ) ) {
    $randomR = mysql_query( 'SELECT id FROM '.MYSQL_TABLE_NAME.' ORDER BY RAND() LIMIT 1' ) or die( 'No cryptos found' );
    $randomA = ( mysql_fetch_array( $randomR ) );
    header( 'Location: '.HOME_URL.'/play/'.$randomA[ 0 ] );
    exit(  );
}
showTop( 1 );
?>

<div class="row">
    <div class="span12" id="game" data-crypto-id="<?php echo $_GET[ 'id' ];?>">
        <div class="progress progress-striped active">
            <div class="bar" style="width: 1%;" id="loading"></div>
        </div>
    </div>
</div>
<?php showBottom(  );?>