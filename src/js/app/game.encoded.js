    window.game.encoded=function(){$.ajax({
        url:window.homeurl+'/encode/'+$('#game').attr('data-crypto-id'),
        success:function(data){
            $('#loading').attr('style','width:100%');
            $('#game').append(data);
            window.game.fin();
        }
    })};