    $( '#loading' ).attr( 'style', 'width:30%' );
    $.ajax({
        url:$('#homeurl').attr('href')+'/encode.php?id='+$('#game').attr('data-crypto-id'),
        complete:function(data){
            
        }
    })