    window.game.modals=function(){console.log('modals fired');$.ajax({
        url:window.homeurl+'/mkmodals.php',
        beforeSend:function(){
            $('#loading').attr('style','width:12%');
        },
        success:function(data){
            $('#game').append(data);
            $('#loading').attr('style','width:20%');
            window.game.encoded();
        }
    })};
    window.game.r(window.game.modals);