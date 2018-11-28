<?php
session_start();

//initialize variables
$SID  = "";
$SName = "";
$ContactNo = "";
$CID= "";

$edit_state = false;

$db= mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');

if(isset($_POST['save'])){
$SID = $_POST['SID'];
$SName = $_POST['SName'];
$ContactNo = $_POST['ContactNo'];
$CID = $_POST['CID'];


$query= "INSERT INTO salespersons_13122(SID, SName, ContactNo, CID) VALUES('$SID', '$SName', '$ContactNo', '$CID')";
mysqli_query($db, $query);
$_SESSION['msg']= "Adress saved";

header('location: sales.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$SID =($_POST['SID']);
$SName= ($_POST['SName']);
$ContactNo= ($_POST['ContactNo']);
$CID = ($_POST['CID']);
						
mysqli_query($db, "UPDATE salespersons_13122 SET SID='$SID', SName='$SName', ContactNo='$ContactNo', CID='$CID' WHERE SID='$SID'");

$_SESSION ['msg']= "Adress updated";
header('location: sales.php');
}
//delete records
if(isset($_GET['del'])){
	$SID = $_GET['del'];
	mysqli_query($db, "DELETE FROM salespersons_13122 WHERE SID='$SID' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: sales.php');
}


$results= mysqli_query($db, "SELECT * FROM salespersons_13122");
?>
