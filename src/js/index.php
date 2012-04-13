<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( dirname( __FILE__ ) ) );
require_once( ROOT.'/m.php' );
$appJS = array( 'app/game', 'app/game.modals', 'app/game.modalh', 'app/game.encoded', 'app/init' );
header( 'Content-type: text/javascript; charset: UTF-8' );
echo '$(document).ready(function(){'."\n";
echo '    window.homeurl="'.HOME_URL.'"'."\n";
$appJSDir = dirname(__FILE__).'/';
foreach ( $appJS as $js ) {
    $thisFile = $appJSDir.$js.'.';
    if ( is_file( $thisFile.'min.js' ) ) $thisFile.='min.js';
    else $thisFile.='js';
    $jsH = fopen( $thisFile, 'r' );
    echo fread( $jsH, filesize( $thisFile ) )."\n";
    fclose( $jsH );
    flush(  );
}
echo '});';
flush(  );
?>