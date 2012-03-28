<?php
$appCSS = array( 'bootstrap.min.css', 'bootstrap-responsive.min.css', 'app.css' );
header( 'Content-type: text/css; charset: UTF-8' );
$appCSSDir = dirname(__FILE__).'/';
foreach ( $appCSS as $css ) {
    if ( $css=='.' || $css=='..' ) continue;
    $cssH = fopen( $appCSSDir.$css, 'r' );
    echo fread( $cssH, filesize( $appCSSDir.$css ) );
    fclose( $cssH );
    flush();
}
flush(  );
?>