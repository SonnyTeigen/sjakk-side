<?php

session_start();
// logger brukeren ut hvis de er innloget.
if(isset($_SESSION['Bruker_id']))
{
	unset($_SESSION['Bruker_id']);
}

header("Location: logginn.php");
die;