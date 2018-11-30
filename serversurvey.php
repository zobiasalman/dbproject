<?php
session_start();

//initialize variables
$SHOPID  = "";
$SHOPNAME = "";
$SNAME = "";
$SHOPDESC = "";
$DATE = "";
$TIME = "" ;

$edit_state = false;

$db= mysqli_connect('localhost', 'root', '', 'mysql');

if(isset($_POST['save'])){
$SHOPID = $_POST['SHOPID'];
$SHOPNAME = $_POST['SHOPNAME'];
$SNAME = $_POST['SNAME'];
$SHOPDESC = $_POST['SHOPDESC'];
$DATE = $_POST['DATE'];
$TIME = $_POST['TIME'];


$query= "INSERT INTO survey13122(SHOPID, SHOPNAME, SNAMEe, SHOPDESC, DATE, TIME) VALUES('$SHOPID', '$SHOPNAME', '$SNAME', '$SHOPDESC', '$DATE', '$TIME')";
mysqli_query($db, $query);
$_SESSION['msg']= "Adress saved";

header('location: survey.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$SHOPID =($_POST['SHOPID']);
$SHOPNAME= ($_POST['SHOPNAME']);
$SNAME= ($_POST['SNAME']);
$SHOPDESC = ($_POST['SHOPDESC']);
$DATE= ($_POST['DATE']);
$TIME= ($_POST['TIME']);
							

mysqli_query($db, "UPDATE survey13122 SET SHOPID='$SHOPID', SHOPNAME='$SHOPNAME', SNAME='$SNAME',SHOPDESC='$SHOPDESC', DATE='$DATE', TIME='$TIME' WHERE SHOPID='$SHOPID'");

$_SESSION ['msg']= "Adress updated";
header('location: survey.php');
}
//delete records
if(isset($_GET['del'])){
	$SHOPID = $_GET['del'];
	mysqli_query($db, "DELETE FROM survey13122 WHERE SHOPID='$SHOPID' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: survey.php');
}


$results= mysqli_query($db, "SELECT * FROM survey13122");
?>