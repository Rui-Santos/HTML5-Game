<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );

$countR = mysql_query( 'SELECT COUNT(*) FROM '.MYSQL_TABLE_NAME );
$countA = mysql_fetch_array( $countR );
$p = intval( $countA[ 0 ] );

if ( !isset( $_GET[ 'id' ] ) ) {
    if ( $p < 1 ) {
        header( 'Location: '.HOME_URL.'/add.php?nocontent' );
        exit(  );
    }
    $randomR = mysql_query( 'SELECT id FROM '.MYSQL_TABLE_NAME.' ORDER BY RAND() LIMIT 1' ) or die( 'No cryptos found' );
    $randomA = ( mysql_fetch_array( $randomR ) );
    header( 'Location: '.HOME_URL.'/play/'.$randomA[ 0 ] );
    exit(  );
}
showTop( 1 );
$id = $_GET[ 'id' ];
?><div class="row"><div class="span12" id="game" data-crypto-id="<?php echo $id;?>"><div class="progress progress-striped active" id="loadingcontainer"><div class="bar" style="width: 1%;" id="loading"></div></div></div></div><?php
showBottom(  );
exit();
$pagesperpage = ( 10<=$p?10:$p );
if ( $p <= ( ( $id ) + $pagesperpage ) ) $nextBTN = false;
else $nextBTN = true;

if ( $id <= $pagesperpage ) $prevBTN = false;
else $prevBTN = true;

?>
<div class="pagination pagination-centered">
    <ul>
        <?php if ( $prevBTN ) echo '<li><a href="'.HOME_URL.'/play/1">&laquo;</a></li>';?>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <?php if ( $nextBTN ) echo '<li><a href="'.HOME_URL.'/play/'.$p.'">&raquo;</a></li>';?>
    </ul>
</div>
<?php showBottom(  );?>