<?php
   session_start();

   include("connection.php");
   include("functionsEngelsk.php");

   $user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Hovedside</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" href="stylesheet.css">
   <link rel="stylesheet" href="assets/styles/cm-chessboard.css"/>
   <link rel="stylesheet" href="examples/styles/examples.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
</head>

<body>

<header>
  <nav class="navigasjon">
    <img class="logo" src="./assets/images/konge.png" alt="logo">
    <h1>Manual chess</h1>
    <a href=""></a>
    <a href="assistertEngelsk.php">Assisted</a>
    <a href="logoutEngelsk.php">Log out</a>
    <div class="dropdown">
      <button class="dropbtn">Language</button>
      <div class="dropdown-content">
        <a href="index.php">Norwegian</a>
        <a href="indexEngelsk.php">English</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
  <button onclick="myFunction()"><h2>Vis/Skjul Regler</h2></button>
</header>

<div class= "hovedinnhold">

  <div class="spillcontainer">

<div class="board" id="board"></div>
<script type="module">
    import {Chessboard} from "./src/cm-chessboard/Chessboard.js"

    const board = new Chessboard(document.getElementById("board"), {
        position: "start"
    })
    board.enableMoveInput()
</script>
 
 <script>
 function myFunction() {
  var x = document.getElementById("hoyre");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
  </div>
<div id="hoyre">
    <article>Chess rules 

<h1>Hello, <?php echo $user_data['Bruker_navn']; ?>, this is the course of the game:</h1> 

  <p>The player who plays with the white pieces called "white", while the player who plays with the black pieces called "black" or "black". It is always "white" who starts the game, and you always move only one move at a time before it is the opponent's turn.</p>  

<p>In official tournaments, it is usually predetermined who starts with which color, either by having the entire tournament set up in advance or according to a given system that will divide the opponents by points and color in previous rounds.</p>  

Piece movement: 
<div></div>

<p>King:  

The king can be moved one, and only one field at a time - either horizontally, vertically or diagonally. The exception is by castling, as the king always moves two squares towards the tower it is rowing with.</p>

<p><img src="./assets/images/konge.png"></p>

<p>The tower:  

The tower can move to all available fields in horizontal and vertical directions.</p>

<p><img src="./assets/images/tarn.png"></p>

<p>The runners:  

The runners can move to all available fields in the diagonal direction. </p>

<p><img src="./assets/images/loper.png"></p>

<p>The queen:  

The queen can move to all available fields in all directions, horizontally, vertically and diagonally.</p>

<p><img src="./assets/images/dronning.png"></p>

<p>The jumper:  

The jumper is always moved one field horizontally or vertically and one field diagonally. The jumper always changes color on the field it is in when it is moved.  </p>

<p><img src="./assets/images/hest.png"></p>

<p>Pawn:  

The white pawn can be moved to the fields marked with X. The pawn on c6 can also hit one of the towers. 
<div></div>
Transformation: A pawn that comes all the way across the board to the 8th row (1st row for the opponent) must be transformed into an officer of the player's choice. Which piece is chosen does not depend on which other officers are on the board, ie you can choose a queen (the most common), even if you already have the queen on the board.  </p>

<p><img src="./assets/images/bonde.png"></p>

<p>Castling:  

Castling is a special feature where both the king and a tower are moved. In order to complete a castling, neither the king nor the tower must have moved earlier in the game, and all the fields between the two pieces must be free. By castling, the king is moved two steps towards the tower, then the tower is moved over the king, to the field next to it. 
<p></p>

In the case of «short castling», the king rolls with the tower in the h-line. For white, the king is moved from e1 to g1, while the tower is moved from h1 to f1. For black, the king is moved from e8 to g8, while the tower is moved from h8 to f8. In the case of a "long castling", the king roars with the tower in the a-line. For white, the king is moved from e1 to c1, while the tower is moved from a1 to d1. For black, the king is moved from e8 to c8, while the tower is moved from a8 to d8. </p>

<p>Castling is not allowed if:</p>
<ul>
<li>The king or tower you want to rock with has moved earlier in the party.</li>

<li>The king is in check (ie is attacked by the opponent).</li>

<li>The field the king is to cross over is attacked by the opponent.</li> 

<li>The field the king moves to is attacked by the opponent.</li> 
</ul>

<p>Chess and chess mat:</p>

<p>A player is said to stand in check if one's king is attacked by any of the opponent's pieces (except the king). Since it is not allowed to stand in or move into chess, this can be avoided with:</p>

<p>Exit the chess, go to a field that is not attacked by any of the opponent's pieces,

Put a piece between the king and the attacked piece,

Knock out the piece that attacks the king.</p>

<p>A player is said to be in check matte if one's king is attacked by any of the opponent's pieces (except the king), without one's king being able to exit the chess or one can put a piece in between or one can knock out the attacking piece. The one who is in checkmate has lost the game and the game is over.</p>


<p><h1>Opening cover</h1></p>

<p>
<ul>
<p><li>Italian opening: Italian opening begins with 1.e4-> e5 2.Hf3-> Hc6 3.Lc4. The point is to gain control of the center quickly with your farmer and horse and then place the runner on the most dangerous field. You are also preparing to get the king to safety with castling.</li></p>  

<p><iframe width="420" height="315"
src="https://youtube.com/embed/_nGha-AXU3M">
</iframe></p>

<p><li>Sicilian defense: Italian opening begins with 1.e4-> e5 2.Hf3-> Hc6 3.Lc4. The point is to gain control of the center quickly with your farmer and horse and then place the runner on the most dangerous field. You are also preparing to get the king to safety with castling.</li></p>  

<p><iframe width="420" height="315"
src="https://youtube.com/embed/G4QqyHrz1hk">
</iframe></p>

<p><li>French defense: The French defense is one of the first strategic openings that every chess player should learn. After e5 (now or afterwards), both sides will have peasant chains. One risk with the French defense is that the c8 runner can be very difficult to develop.</li></p> 

<p><iframe width="420" height="315"
src="https://youtube.com/embed/EAEqtbfzb40">
</iframe></p>

<p><li>Ruy-Lopez: Spanish opening is one of the oldest and most classic openings. It was named after a Spanish bishop who wrote one of the first books on chess. Ruy Lopez attacks the horse defending the e5 farmer. White hopes to use this attack to put more pressure on black in the center.</li></p>  

<p><iframe width="420" height="315"
src="https://youtube.com/embed/4GexCkZlTPg">
</iframe></p>

<p><li>Slavic defense: Slavic defense is a very solid opening that provides safe defense of the d5 farmer. All the black pieces can be developed into natural fields, but black will usually have a little less space.</li></p>
</ul>

<p><iframe width="420" height="315"
src="https://youtube.com/embed/0mw1x0N__Ww">
</iframe></p>

</p>  

 </article>

</div>
</div>

<footer>

    <div class= "footertext">
        <p>HTML and associated CSS / javascript created by Group20:</p>

        <p> Tedros Robel, Filip Johansen, Sonny Uldal Teigen, Nicholas Gundersen Sæthre </p>

        <p>Chess API and associated CSS / javascript:</p>

<p>Copyright (c) 2017 Stefan Haack <shaack@gmail.com> (http://shaack.com)(https://github.com/shaack/cm-chessboard)</p>

    </div>
</footer>
</body>
</html>