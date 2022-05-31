<?php
session_start();

  include("connection.php");
  include("functionsEngelsk.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    
    $email = $_POST['email'];
    $Bruker_navn = $_POST['Bruker_navn'];
    $passord = $_POST['passord'];
    
    // sørger for at ingen av feltene er tome 
    if(!empty($Bruker_navn) && !empty($passord) && !empty($email))
    {
      $Bruker_id = random_num(20);
      // tar infoen fra login og sender en SQL spøring får å lage en bruker
      $query = "insert into Brukerer (Bruker_id,email,Bruker_navn,passord) values ('$Bruker_id','$email','$Bruker_navn','$passord')";

      mysqli_query($con, $query);

      header("Location: logginnEngelsk.php");
      die;
    }else 
    {
      echo "Please enter some valid information!";
    }
  }  
?>
<!DOCTYPE html>
<html>
	<head>
	 <title>Sign Up</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" href="stylesheet.css">
   <link rel="stylesheet" href="assets/styles/cm-chessboard.css"/>
   <link rel="stylesheet" href="examples/styles/examples.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
   <script src="app.js"></script>
	</head>
	<body>
<header>
  <nav class="navigasjon">
    <img class="logo" src="./assets/images/dronning.png" alt="logo">
    <h1>Register</h1>
    <a href=""></a>
    <a href="indexEngelsk.php">Manual</a>
    <a href="assistertEngelsk.php">Assisted</a>
    <a href="logginnEngelsk.php">Log in</a>
    <a href="logoutEngelsk.php">Log out</a>
    <div class="dropdown">
      <button class="dropbtn">Language</button>
      <div class="dropdown-content">
        <a href="singup.php">Norwegian</a>
        <a href="singupEngelsk.php">English</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
</header>
    <br>
    <div class="login">
      <form method="post">
        <input id="text2" type="text" placeholder="E-mail" name="email"><br>
        <input id="text3" type="text" placeholder="Nick name" name="Bruker_navn"><br>
        <input id="text" type="password" placeholder="Password" name="passord"><br>
        <input id="button" type="submit" value="Register"><br>
        <a href="logginnEngelsk.php">Eksisting user?</a>
      </form>
    </div>

	</body>
</html>