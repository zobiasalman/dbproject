<?php
session_start();

//initialize variables
$UserID  = "";
$Password = "";
$Active = "";
$SalesPerson = "";

$edit_state = false;

$db= mysqli_connect('localhost', 'root', '', 'mysql');

if(isset($_POST['save'])){
$UserID = $_POST['UserID'];
$Password = $_POST['Password'];
$Active = $_POST['Active'];
$SalesPerson = $_POST['SalesPerson'];


$query= "INSERT INTO User_13122(UserID, Password, Active, SalesPerson) VALUES('$UserID', '$Password', '$Active', '$SalesPerson')";
mysqli_query($db, $query);
$_SESSION['msg']= "Adress saved";

header('location: user.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$UserID =($_POST['UserID']);
$Password= ($_POST['Password']);
$Active= ($_POST['Active']);
$SalesPerson = ($_POST['SalesPerson']);
						
mysqli_query($db, "UPDATE User_13122 SET UserID='$UserID', Password='$Password', Active='$Active', SalesPerson='$SalesPerson' WHERE UserID='$UserID'");

$_SESSION ['msg']= "Adress updated";
header('location: user.php');
}
//delete records
if(isset($_GET['del'])){
	$UserID = $_GET['del'];
	mysqli_query($db, "DELETE FROM User_13122 WHERE UserID='$UserID' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: user.php');
}


$results= mysqli_query($db, "SELECT * FROM User_13122");
?>