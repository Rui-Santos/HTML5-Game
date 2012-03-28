    var game={
        leftkey:function(){console.log('Fired: Left key');},
        upkey:function(){console.log('Fired: Up key');},
        rightkey:function(){console.log('Fired: Right key');},
        downkey:function(){console.log('Fired: Down key');},
        spacekey:function(){console.log('Fired: Space key/bar');},
        spacebar:function(){game.spacekey();}// Just an alias to the spacekey function.
    };
