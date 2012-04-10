    window.game.encoded=function(){$.ajax({
        url:window.homeurl+'/encode.php?id='+$('#game').attr('data-crypto-id'),
        success:function(data){
            $('#loading').attr('style','width:100%');
            $('#game').append(data);
            window.game.fin();
        }
    })};
