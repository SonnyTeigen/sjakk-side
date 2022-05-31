<?php

$dbhost = "itfag.usn.no";
$dbuser = "h21u94820711";
$dbpass = "monmon12345";
$dbname = "h21DAT2000db94820711";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
