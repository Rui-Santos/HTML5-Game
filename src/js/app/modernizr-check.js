    if ( !( Modernizr.fontface && Modernizr.mediaqueries ) ) window.location = homeurl+'/badbrowser.php?ff='+(Modernizr.fontface?'fail':'')+'&mq='+(Modernizr.mediaqueries?'fail':'');