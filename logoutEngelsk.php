<?php

session_start();

if(isset($_SESSION['Bruker_id']))
{
	unset($_SESSION['Bruker_id']);
}

header("Location: logginnEngelsk.php");
die;