<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
	header("Location: login.php");
}
?>

<h2>Login Sucessfull!</h2>

	