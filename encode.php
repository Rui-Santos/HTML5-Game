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
$data = strtolower( $dataA[ 0 ] );
$alphabet = 'abcdefghijklmnopqrstuvwxyz';
$substitutions = array(  );
$lettersUnused = array( 'key'=>strtolower( $alphabet ), 'val'=>strtoupper( $alphabet ) );
while ( strlen( strval( $lettersUnused[ 'key' ] ) ) >= 1 ) {
    $key=$lettersUnused[ 'key' ][ mt_rand( 0, strlen( $lettersUnused[ 'key' ] )-1 ) ];
    $val=$lettersUnused[ 'val' ][ mt_rand( 0, strlen( $lettersUnused[ 'val' ] )-1 ) ];
    $substitutions[ $key ] = '<a href="#l'.strtolower( $val ).'" data-toggle="modal" class="o'.strtolower( $val ).'">'.$val.'</a>';
    $lettersUnused[ 'key' ]=str_replace( $key, '', $lettersUnused[ 'key' ] );
    $lettersUnused[ 'val' ]=str_replace( $val, '', $lettersUnused[ 'val' ] );
}
$cipherText=strtr( $data, $substitutions );
echo $cipherText;
?>