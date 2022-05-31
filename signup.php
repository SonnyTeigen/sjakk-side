<?php
session_start();

  include("connection.php");
  include("functions.php");

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
      header("Location: logginn.php");
      die;
    }else 
    {
      echo "Venligst set in gyldig informasjon!";
    }
  }  
?>
<!DOCTYPE html>
<html>
	<head>
	 <title>E-bok side</title>
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
    <h1>Registering</h1>
    <a href=""></a>
    <a href="index.php">Manuell</a>
    <a href="assistert.php">Assistert</a>
    <a href="logginn.php">Logg inn</a>
    <a href="logout.php">Logg ut</a>
    <div class="dropdown">
      <button class="dropbtn">Språk</button>
      <div class="dropdown-content">
        <a href="signup.php">Norsk</a>
        <a href="signupEngelsk.php">Engelsk</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
</header>
    <br>
    <div class="login">
      <form method="post">
        <input id="text2" type="text" placeholder="E-mail" name="email"><br>
        <input id="text3" type="text" placeholder="Kallenavn" name="Bruker_navn"><br>
        <input id="text" type="password" placeholder="Passord" name="passord"><br>
        <input id="button" type="submit" value="registrer"><br>
        <a href="logginn.php">Har alerede bruker?</a>
      </form>
    </div>

	</body>
</html>