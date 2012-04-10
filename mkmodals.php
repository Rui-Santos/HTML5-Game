<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
$gen = ROOT.'/gen/mkmodals.htm';
if ( is_file( $gen ) ) require_once( $gen );
$alphabet = 'abcdefghijklmnopqrstuvwxyz';
for ( $c=0; $c<strlen( $alphabet ); $c++ ) {
    $l = strtolower( $alphabet[ $c ] );?>
<div id="l<?php echo $l;?>" class="modal hide fade">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Letter <?php echo strtoupper( $l );?></h3>
    </div>
    <div class="modal-body">
        <h4>Type in the new value of <?php echo strtoupper( $l );?></h4>
        <form><input type="text" id="i<?php echo $l;?>"></form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>
<?php
    flush(  );
}
?>