<?php

session_start();

  include("connection.php");
  include("functionsEngelsk.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $email = $_POST['email'];
    $passord = $_POST['passord'];

    if(!empty($email) && !empty($passord))
    {
      $query = "select * from Brukerer where email = '$email' limit 1";

      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['passord'] === $passord)
          {

            $_SESSION['Bruker_id'] = $user_data['Bruker_id'];
            header("Location: indexEngelsk.php");
            die;
          }
        }
      }
      echo "Wrong E-mail or password!";
    }else 
    {
      echo "Please enter some valid information!";
    }
  }  
?>
<!DOCTYPE html>
<html>
	<head>
	 <title>Log in</title>
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
    <h1>Log in</h1>
    <a href=""></a>
    <a href="indexEngelsk.php">Manual</a>
    <a href="assistertEngelsk.php">Assisted</a>
    <a href="signupEngelsk.php">Register</a>
    <a href="logoutEngelsk.php">Log out</a>
    <div class="dropdown">
      <button class="dropbtn">Language</button>
      <div class="dropdown-content">
        <a href="logginn.php">Norwegian</a>
        <a href="logginnEngelsk.php">English</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
</header>

    <br>
    <div class="login">
      <form method="post">
        <input type="text" placeholder="E-mail" name="email"><br>
        <input type="password" placeholder="Password" name="passord"><br>
        <input type="submit" value="Log in"><br>
        <a href="signupEngelsk.php">New User?</a>
      </form>
    </div>
	</body>
</html>