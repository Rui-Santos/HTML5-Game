<?php
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.php' );
showTop( 3 );
?>

<div class="row">
    <div class="span8">
        <p><h1>How to play</h1></p>
        <p>Playing the game is very easy. To play the game, just click on "<a href="<?php echo HOME_URL;?>">New Game</a>". That will launch a new game, and if you are currently playing the game and you click on it, you  will lose your progress in the current game and start a new one. Clicking on the name ("Crypto Game") is just like clicking on "New Game".</p>
        <p>There are <?php if ( defined( 'PROVIDE_ORIGIN' )?PROVIDE_ORIGIN:false ) echo '3'; else echo '2';?> tabs. The first is called "Main". The main tab has the <abbr title="The 'Cipher Text' is basically the encrypted version of 'Data' (which is explained in the Data section of this page.">cipher text</abbr>. You can click on a letter, and type in what you think it is. Examples are on the right. If nothing happens when you click on the letter and type, then the text box is probably not focused. Simply click on the text box and type the letter.</p>
        <?php if ( defined( 'PROVIDE_ORIGIN' )?PROVIDE_ORIGIN:false ){?><p>The second tab is the "Original" tab. It is like the Main tab, but you can't click on the letters, so the letters can't be changed. You just see the original ciphertext.</p><?php }?>
        <p>The last tab is the "Solution" tab. If you go to that tab, the game will ask you if you are 100% sure you want to cheat (unless you have already attempted to figure everything out and changed all of the letters), and if you say yes, the game will tell you the data.</p>
        <p>Game play is obvious: go to the main tab and try to figure out what stuff is. If you need help, use the "hint" button. It will (sometimes) give you help (and other times ask you why you need so much help).</p>
        <p>When you finish the game, all you have to do is go to the solution tab and check out the solution.</p>
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
<div class="row">
    <div class="span12">
        <p><h1><abbr title="How the game works on the inside.">Behind-the-scenes</abbr></h1></p>
    </div>
</div>
<div class="row">
    <div class="span6">
        <p><h3><code>encode.php</code> - the file that actually encodes the data and provides the encoded version and decoded version of the data</h3></p>
        <p>People will never actually go to this file,they will go to <code>/encode/x</code> and Apache will pretend that they went to <code>/encode.php?id=x</code> (where X is a number, specifically the ID that corresponds to specific data).</p>
        <p>This script will perform a MySQL <code>select</code> statement to grab the data field of a row which has the ID of <code>$_GET['id']</code> (so if the "raw" URL was <code>/encode/3</code>, the ID would be 3). </p>
        <p>After that data is found, it will be encoded with a substitution cipher. The rules of the cipher will be randomized at execution time (i.e., every time a user goes to that page, and brand-new set of rules will be generated and used).</p>
        <p>The actual encoding process is pretty simple; the script simply runs <code>strtr()</code> on the plain/clear text data twice. The first time, we replace letters with letters that are wrapped in anchor tags. So if the rules dictated that "a" would become "x", then "a" would actually become <code>&lt;a href="#lx" data-toggle="modal" class="ox"&gt;X&lt;/a&gt;</code>. The second substitution is just a plain substitution (if "a" is "x" in the rules, then "a" will become "x").</p>
        <p>It will also setup the tabs, which are pretty self-explanitory.</p>
    </div>
    <div class="span6">
        <p><h3><code>badbrowser.php</code> and <code><abbr title="Found in /js/app/">modernizr-check.js</abbr></code> - the files that keep old browsers out!</h3></p>
        <p><code>modernizr-check.js</code> will make the website look better on mobile devices</p>
        <p><code>modernizr-check.js</code> will also redirect the user to <code>badbrowser.php</code> if the end-user's browser doesn't support the CSS3 feature <code>@font-face</code>.</p>
        <p><code>badbrowser.php</code> will tell the end user that their browser is old/outdated, and will also tell them to upgrade to Firefox or Google Chrome.</p>
    </div>
</div>
<div class="row">
    <div class="span4">
        <p><h3><code>config.php</code> and <code>.htaccess</code></h3></p>
        <p>The <code>config.php</code> file manages configuration settings. It defines the HOME_URL (which is the URL where the game is put) and the MySQL configuration options. It also allows you to choose if you want to enable the origin (PROVIDE_ORIGIN) and allows you to say what is profanity ($profanity)</p>
        <p>The <code>.htaccess</code> file is very simple. It just says "forward this URL to this URL", which allows us to use nice URLs.
    </div>
    <div class="span4">
        <p><h3><code>add.php</code> and <code>m.php</code></h3></p>
        <p><code>add.php</code> allows end-users to insert one or more new rows to your MySQL table (they type in the data).</p>
        <p><code>m.php</code> is the core. All php files execute a <code>require_once</code> on <code>m.php</code>, which is essential. The idea behind this is that commonly used includes are already in included by <code>m.php</code> so you don't have to write 100 lines of <code>require_once( 'blah' )</code>. This file is also useful if you want to take the site down for maintenance; you can just add something like <code>die( '&lt;h1&gt;Down for maintenance&lt;/h1&gt;' );</code> to the top of <code>m.php</code> and the whole site will be down.</p>
    </div>
    <div class="span4">
        <p><h3><code>help.php</code> (this file) and <code>hint.php</code></h3></p>
        <p><code>help.php</code> provides help and documentation.</p>
        <p><code>hint.php</code> gives the users hints when they ask for them. It ignores the first character, and if it runs into any characters other than letters (characters that were never encoded), it reminds the user not to cheat.</p>
    </div>
</div>
<div class="row">
    <div class="span12">
        <p><h2>One more thing to keep in mind when viewing the source:</h2></p>
        <p>The "build" dir is a dir where everything is "minified" and it's all about being compressed. The "src" dir is the opposite - everything is very easy to read and understand. "src" is for testing/developing, "build" is for production (like this site here).</p>
    </div>
</div>
<?php showBottom(  );?>