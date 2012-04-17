    window.game.ischeating=function(){
        window.tmpcheck = true;
        window.simpleC.fire();
    }
    window.tmpcheck = false;
    window.simpleC = $.Callbacks();
    window.simpleC1 = function() {
        $( '#main a' ).each(function(){
            if ( !($(this).hasClass('changed')) ) window.tmpcheck=false;
        });
    }
    window.simpleC2 = function() {
        if ( window.tmpcheck == true ) {
            if ( $('#ruserious').length > 0 ) {
                $('#thesolution').slideDown();
                $('#ruserious').hide();
            }
        }
    }
    window.simpleC.add(simpleC1);
    window.simpleC.add(simpleC2);