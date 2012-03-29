    window.game={
        volume:3,
        leftkey:function(){console.log('Fired: Left key');},
        upkey:function(){console.log('Fired: Up key');},
        rightkey:function(){console.log('Fired: Right key');},
        downkey:function(){console.log('Fired: Down key');},
        spacekey:function(){console.log('Fired: Space key/bar');},
        spacebar:function(){game.spacekey();},// Just an alias to the spacekey function.
        init:function(){console.log('init Fired.');
            $('#game').html(' ');
            $('#game').append('<i id="volume" class=""></i>');
            window.game.refreshVolume();
            $('#game').append('');
        },
        mute:function(){console.log('mute Fired.');
            window.game.volume=0;
            window.game.refreshVolume();
        },
        refreshVolume:function(){console.log('refreshVolume Fired.');
            $('i#volume').attr('class','icon-volume-'+( game.volume==1?'off':( game.volume==2?'down':'up' ) ));
        }
    };