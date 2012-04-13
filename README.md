Crypto Game
===========

This "Crypto Game" is based on substitution ciphers. The concept is you give the game data (e.g. a famous quote) and it gives you a game where you have to figure out what the data is.


How the cipher works
--------------------

It's a one-way simple substitution cipher. The PHP will (on-the-fly) generate a new "alphabet" of rules. PHP will use these random rules to make the cipher text. Here's an example:
*New alphabet rules: "a"->"x", "b"->"y", "c"->"z"
*Data (aka clear text, aka plain text, aka input)="abc"
*Cipher Text (aka output)="xyz"
The user has the ability to try to figure out what the data (plain text) is by declaring their own alphabet of rules. The user can click on a letter, and type a new letter (a modal will popup with a simple form with a text input for the user to type in, and that input will automatically be focused).
So, the user could make their rules: "x"->"a", "y"->"b", "z"->"c"
In which case the example before would be reversed, so "abc" would be "abc" instead of "xyz".


Live Demo
=========

Available [here](http://jamescostian.com/game)


Credits
=======

James Costian
-------------

Built the game


Twitter (@mdo and @fat)
-----------------------

Made Bootstrap (which the game uses).


jQuery
------

Now website would be complete without it, including this one.