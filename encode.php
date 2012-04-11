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
$substitutionsHTML = array(  );
$lettersUnused = array( 'key'=>strtolower( $alphabet ), 'val'=>strtoupper( $alphabet ) );
while ( strlen( strval( $lettersUnused[ 'key' ] ) ) >= 1 ) {
    $key=$lettersUnused[ 'key' ][ mt_rand( 0, strlen( $lettersUnused[ 'key' ] )-1 ) ];
    $val=$lettersUnused[ 'val' ][ mt_rand( 0, strlen( $lettersUnused[ 'val' ] )-1 ) ];
    $substitutions[ $key ] = strtoupper( $val );
    $substitutionsHTML[ $key ] = '<a href="#l'.strtolower( $val ).'" data-toggle="modal" class="o'.strtolower( $val ).'">'.$val.'</a>';
    $lettersUnused[ 'key' ]=str_replace( $key, '', $lettersUnused[ 'key' ] );
    $lettersUnused[ 'val' ]=str_replace( $val, '', $lettersUnused[ 'val' ] );
}
$cipherText=array( 'html'=>strtr( $data, $substitutionsHTML ), 'raw'=>strtr( $data, $substitutions ) );
?>
<div class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#main" data-toggle="tab">Main</a></li><li><a href="#origin" data-toggle="tab"><abbr title="The orriginal Ciphertext, which is what you got originally. On the Main tab, you can edit the text, but on this tab you can't edit anything.">Orriginal</abbr></a></li><li><a href="#solution" data-toggle="tab">Solution (for cheaters)</a></li></ul><div class="tab-content"><div class="tab-pane active" id="main"><?php echo $cipherText[ 'html' ];?></div><div class="tab-pane" id="origin"><?php echo $cipherText[ 'raw' ];?></div><div class="tab-pane" id="solution"><?php echo strtoupper( $data );?></div></div></div>
<?php exit();?>