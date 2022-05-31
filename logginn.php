<?php

session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $email = $_POST['email'];
    $passord = $_POST['passord'];
    // sørger for at ingen av feltene er tome 
    if(!empty($email) && !empty($passord))
    {
      // sjekker om emailen finnes i databasen 
      $query = "select * from Brukerer where email = '$email' limit 1";

      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);
          // sjekker om passordet passer til emailen
          if($user_data['passord'] === $passord)
          {

            $_SESSION['Bruker_id'] = $user_data['Bruker_id'];
            header("Location: index.php");
            die;
          }
        }
      }
      echo "Fail E-mail eller passord!";
    }else 
    {
      echo "Venligst set in gyldig informasjon!";
    }
  }  
?>
<!DOCTYPE html>
<html>
	<head>
	 <title>Logg inn</title>
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
    <h1>Logg Inn</h1>
    <a href=""></a>
    <a href="index.php">Manuell</a>
    <a href="assistert.php">Assistert</a>
    <a href="signup.php">Registering</a>
    <a href="logout.php">Logg ut</a>
    <div class="dropdown">
      <button class="dropbtn">Språk</button>
      <div class="dropdown-content">
        <a href="logginn.php">Norsk</a>
        <a href="logginnEngelsk.php">Engelsk</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
</header>

    <br>
    <div class="login">
      <form method="post">
        <input type="text" placeholder="E-mail" name="email"><br>
        <input type="password" placeholder="Passord" name="passord"><br>
        <input type="submit" value="Logg inn"><br>
        <a href="signup.php">Har ikke bruker?</a>
      </form>
    </div>
	</body>
</html>