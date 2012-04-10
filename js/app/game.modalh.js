    window.game.modalh=function(){
        // Modal handler
        $('input').keyup(function(){
            $(this).parent().parent().parent().modal('hide'); // Hides the modal before we actually do anything
            window.newval=this.value;
            this.value='';
            $(this).attr('id','i'+window.newval);
            $('a[href="#l'+window.oldval+'"]').each(function(){
                if ($(this).hasClass('o'+window.origin)) {
                    $(this).attr('href','#l'+window.newval);
                    $(this).html(window.newval.toUpperCase());
                    $(this).attr('title','Originally "'+window.origin.toUpperCase()+'"')
                    if (!$(this).hasClass('changed')) $(this).addClass('changed');
                }
            });
        })
    };