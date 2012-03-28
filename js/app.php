<?php
header( 'Content-type: text/javascript; charset: UTF-8' );
echo '$(document).ready(function(){'."\n";
$appJSDir = dirname(__FILE__).'/app/';
$appJS = scandir( $appJSDir, 0 );
sort( $appJS );
foreach ( $appJS as $js ) {
    if ( $js=='.' || $js=='..' ) continue;
    $jsH = fopen( $appJSDir.$js, 'r' );
    echo fread( $jsH, filesize( $appJSDir.$js ) );
    fclose( $jsH );
    flush();
}
echo "\n".'});';
flush();
?>