<?php
$appJS = array( 'app/d', 'app/game', 'app/triggers' );
header( 'Content-type: text/javascript; charset: UTF-8' );
echo '$(document).ready(function(){'."\n";
echo '    if (!Modernizr.localstorage)window.location="badbrowser.php?for=localstorage";'."\n";
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
echo "    game.init()\n";
echo '});';
flush(  );
?>