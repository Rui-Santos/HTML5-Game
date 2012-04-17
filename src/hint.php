<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
$idR = strval( mysql_real_escape_string( $_GET[ 'id' ] ) ); // This will be the semi-sanitized ID
$id = ''; // This will be the 100% sanitized ID
for ( $c=1; $c <= strlen( $idR ); $c++ ) {
    if ( strpos( ' 0123456789', $idR[ $c-1 ] ) ) $id.=$idR[ $c-1 ];
}
$dataR = mysql_query( 'SELECT data FROM '.MYSQL_TABLE_NAME.' WHERE id='.$id ) or die('Big fail');
if ( mysql_num_rows( $dataR ) < 1 ) die( '<h1>404 - Crypto Not Found!</h1>' );
$dataA = mysql_fetch_array( $dataR );
$data = strtoupper( $dataA[ 0 ] );
echo '<div class="alert alert-info" style="margin-bottom:0"><a class="close" data-dismiss="alert">&times;</a><strong>';
$alphabet = 'abcdefghijklmnopqrstuvwxyz';
$alphabet.=strtoupper( $alphabet );
if ( strpos( $alphabet, $data[ intval( $_GET[ 'char' ] ) - 1 ] ) === false ) echo 'Don\'t just cheat! If you absolutely <em>need</em> a hint, just read the next.';
else echo 'Character #'.$_GET[ 'char' ].' is "'.$data[ intval( $_GET[ 'char' ] ) - 1 ].'"';
echo '</strong></div>';
?>