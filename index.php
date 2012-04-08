<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
?><!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Cryptogram</title>
    <meta name="description" content="">
    <meta name="author" content="James Costian">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/css/<?php if ( is_file( ROOT.'/css/min.css' ) ) echo 'min.css'; ?>">
    <style>body{padding:50px 0}</style>
    <!--[if lt IE 9]><script src="<?php echo HOME_URL;?>/js/html5.js"></script><![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span12" id="game" data-cryptogram="<?php
if ( isset( $_GET[ 'id' ] ) ) echo $_GET[ 'id' ];
$random = mysql_query( 'SELECT id FROM '.MYSQL_TABLE_NAME.' ORDER BY RAND() LIMIT 1' );
$random = ( mysql_fetch_array( $random ) );
echo $random[ 0 ];
?>">
                <div class="progress progress-striped active">
                    <div class="bar" style="width: 1%;" id="loading"></div>
                </div>
            </div>
        </div>
    </div>
<?php
if ( is_file( ROOT.'/js/min.js' ) ) echo '<script src="'.HOME_URL.'/js/min.js">';
else {?>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script><script src="<?php echo HOME_URL;?>/js/modernizr.js"></script><script src="<?php echo HOME_URL;?>/js/bootstrap.min.js"></script><script src="<?php echo HOME_URL;?>/js/"></script>
<?php }?>
</body>
</html>