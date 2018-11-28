<?php
session_start();

//initialize variables
$cid  = "";
$sname = "";
$cname = "";
$cno = "";
$address = "";
$area = "" ;
$gc = "";
$edit_state = false;

$db= mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');

if(isset($_POST['save'])){
$cid = $_POST['cid'];
$sname = $_POST['sname'];
$cname = $_POST['cname'];
$cno = $_POST['cno'];
$address = $_POST['address'];
$area = $_POST['area'];
$gc = $_POST['gc'];

$query= "INSERT INTO customer_13122(CID, Sname, CName, CNO, Address, Area, GC) VALUES('$cid', '$sname', '$cname', '$cno', '$address', '$area', '$gc')";
mysqli_query($db, $query);
$_SESSION['msg']= "Adress saved";

header('location: ind.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$cid =($_POST['cid']);
$sname= ($_POST['sname']);
$cname= ($_POST['cname']);
$cno = ($_POST['cno']);
$address= ($_POST['address']);
$area= ($_POST['area']);
$gc = ($_POST['gc']);							

mysqli_query($db, "UPDATE customer_13122 SET CID='$cid', Sname='$sname', CName='$cname', CNO='$cno', Address='$address', Area='$area', GC='$gc' WHERE CID='$cid'");

$_SESSION ['msg']= "Adress updated";
header('location: ind.php');
}
//delete records
if(isset($_GET['del'])){
	$cid = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_13122 WHERE CID='$cid' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: ind.php');
}


$results= mysqli_query($db, "SELECT * FROM customer_13122");
?>
