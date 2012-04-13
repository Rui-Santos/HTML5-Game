<?php
global $profanity;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
showTop( 2 );
$data = false;
$msg = 'Please enter some text:';
if ( isset( $_POST[ 'data' ] ) ) {
    $data = $_POST[ 'data' ];
    $fail = false;
    foreach ( $profanity as $search ) {
        $pos = strpos( $data, ' '.$search );
        if ( $pos ) {
            $fail = true;
            break;
        }
    }
    if ( $fail===true ) {
        $msg = '<strong style="color:red">You used a bad word. Please do not try to put any bad quotes up.</strong>';
        showBottom(  );
    }
    else {
        $fdata = '';
        for ( $c=1; $c <= strlen( $data ); $c++ ) {
            if ( strpos( ' \'"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.?!;,()-= ', $data[ $c-1 ] ) ) $fdata.=$data[ $c-1 ];
            elseif ( $data[ $c-1 ]==' ' ) $fdata.=' ';
        }
        $fdata = mysql_real_escape_string( $fdata );
        mysql_query( 'INSERT INTO '.MYSQL_TABLE_NAME.' (data) VALUES ("'.$fdata.'")' ) or die( 'We had an error.... Please try again.' );
        $msg = 'Successfully added! Feel free to add another:';
    }
}
elseif ( isset( $_GET[ 'nocontent' ] ) ) $msg = '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>You must first add some content in order to use this!</div>';
?><div class="hero-unit"><h1><?php echo $msg;?></h1><form action="<?php echo HOME_URL.'/add.php';?>" method="post"><textarea id="data" name="data" style="margin-top:50px;width:100%" rows="10"></textarea><input type="submit" value="Add this!" class="btn btn-primary btn-large"></form></div>
<?php showBottom(  );?>