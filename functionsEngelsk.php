<?php
// sjekker om brukeren er logget inn.
function check_login($con)
{

	if(isset($_SESSION['Bruker_id']))
	{
		$id = $_SESSION['Bruker_id'];
		$query = "select * from Brukerer where Bruker_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	header("location: logginnEngelsk.php");
	die;
}
// lager bruker id med tilfeldige nummere.
function random_num($length)
{
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}
	return $text;
}