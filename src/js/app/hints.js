    $('#givehint').click(function(){
        window.game.hintno++; // Increment the hint no.
        $(this).attr('href','#!/hint:'+window.game.hintno.toString());
        setTimeout(function(){$('#givehint').attr('href','#!/hint:next')},500);
        $('#hint').load(homeurl+'/hint.php?id='+$('#game').attr('data-crypto-id')+'&char='+window.game.hintno);
    });