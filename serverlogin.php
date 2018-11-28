<?php

session_start();

$username= "";
$email= "";
$errors= array();

//connect to the database
$db = mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');

//if register button is clicked
if(isset($_POST['register'])){
	$username= ($_POST['username']);
	$email=  ($_POST['email']);
	$password_1=  ($_POST['password_1']);
	$password_2= ($_POST['password_2']);
	
	//ensure form fields are not empty
	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($email)){
		array_push($errors, "Email is required");
	}
	if(empty($password_1)){
		array_push($errors, "Password is required");
	}
	if($password_1 != $password_2){
		array_push($errors, "Password do not match. Try again");
	}
	
	
	//save user to database if no errors
	if(count($errors) == 0){
		$password =md5($password_1); // encrypt pw before storing in db(security)
		$sql = "INSERT INTO login_13122(username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username']= $username;
        $_SESSION['success']= "You are logged in!";
		header('location: home.php'); // redirect to homepage
	}
}
//login from UserLogin Page
if(isset($_POST['login'])){
	$username= ($_POST['username']);
	$password= ($_POST['password']);
	
	//ensure form fields are not empty
	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($password)){
		array_push($errors, "Password is required");
	}
	if(count($errors) == 0){
		$password = md5($password); //encrypt password before comparing with that of db
		$query= "SELECT * FROM login_13122 WHERE username='$username' AND password='$password'";
		$result= mysqli_query($db, $query);
		if(mysqli_num_rows($result)==1){
			//log user in
	    $_SESSION['username']= $username;
        $_SESSION['success']= "You are logged in!";
		header('location: home.php'); // redirect to homepage
			}else{
				array_push($errors, "The username/password is incorrect");
			}
	}
	
}


//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
	
}
?>	
	
		
		
		
	
