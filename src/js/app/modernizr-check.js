    if (Modernizr.mq('(max-width: 980px)')) $(document.body).attr('style','margin-top:0');
    if ( !Modernizr.fontface ) window.location = homeurl+'/badbrowser.php?ff='+(Modernizr.fontface?'fail':'');