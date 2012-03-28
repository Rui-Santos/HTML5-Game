<?php
$appJS = array( 'app/game.js', 'app/triggers.js' );
header( 'Content-type: text/javascript; charset: UTF-8' );
echo '$(document).ready(function(){'."\n";
$appJSDir = dirname(__FILE__).'/';
foreach ( $appJS as $js ) {
    if ( $js=='.' || $js=='..' ) continue;
    $jsH = fopen( $appJSDir.$js, 'r' );
    echo fread( $jsH, filesize( $appJSDir.$js ) )."\n";
    fclose( $jsH );
    flush();
}
echo "\n    game.init()\n".'});';
flush(  );
?>