    $('#loading').attr('style','width:15%');
    window.game={
        call:$.Callbacks(),
        r:function(name){
            // r is short for Register (as in register/add a callback)
            window.game.call.add(name);
        },
        fin:function(){
            $('#loading').attr('style','width:100%');
            $('#loadingcontainer').remove();
        }
    };
