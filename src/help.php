<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
showTop( 3 );
?>

<div class="row">
    <div class="span8">
        <p><h1>How to play</h1></p>
        <p>Playing the game is very easy. To play the game, just click on "<a href="<?php echo HOME_URL;?>">New Game</a>". That will launch a new game, and if you are currently playing the game and you click on it, you  will lose your progress in the current game and start a new one. Clicking on the name ("Crypto Game") is just like clicking on "New Game".</p>
        <p>There are <?php if ( defined( 'PROVIDE_ORIGIN' )?PROVIDE_ORIGIN:false ) echo '3'; else echo '2';?> tabs. The first is called "Main". The main tab has the <abbr title="The 'Cipher Text' is basically the encrypted version of 'Data' (which is explained in the Data section of this page.">cipher text</abbr>. You can click on a letter, and type in what you think it is. Examples are on the right.</p>
    </div>
    <div class="span4">
        <p><h3><em>Examples</em></h3></p>
        <p>Data:<br>Hello, World!</p>
        <p>Cipher Text:<br>HELLX, WXRLD!</p>
        <p>If you change "X" to "O", then the Cipher Text will match the Data, and you will have solved the puzzle. Here's another:</p>
        <p>Data:<br>Hello, World!</p>
        <p>Cipher Text:<br>NGCCA, LAZCF!</p>
        <p>In this example, you will have to change "N" to "H", "G" to "E", "C" to "L", "A" to "O", "L" to "W", "Z" to "R", and "F" to "D".</p>
    </div>
</div>
<?php showBottom(  );?>