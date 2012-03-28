    $(document).keypress(function(e){
        switch(parseInt(e.keyCode?e.keyCode:e.charCode)) {
        case 37:
            game.leftkey();
            break;
        case 38:
            game.upkey();
            break;
        case 39:
            game.rightkey();
            break;
        case 40:
            game.downkey();
            break;
        default:
            if (String.fromCharCode(e.keyCode?e.keyCode:e.charCode)==' ') game.spacekey();
            break;
        }
   });