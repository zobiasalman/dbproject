<?php
session_start();

//initialize variables
$ProductCode  = "";
$Brand = "";
$Type = "";
$Shade = "";
$Size = "";
$SalesPrice = "" ;

$edit_state = false;

$db= mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');

if(isset($_POST['save'])){
$ProductCode = $_POST['ProductCode'];
$Brand = $_POST['Brand'];
$Type = $_POST['Type'];
$Shade = $_POST['Shade'];
$Size = $_POST['Size'];
$SalesPrice = $_POST['SalesPrice'];

$query= "INSERT INTO Product_13122(ProductCode,Brand, Type, Shade, Size,SalesPrice) VALUES('$ProductCode', '$Brand', '$Type', '$Shade', '$Size', '$SalesPrice')";
mysqli_query($db, $query);
$_SESSION['msg']= "Adress saved";

header('location: product.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$ProductCode =($_POST['ProductCode']);
$Brand= ($_POST['Brand']);
$Type= ($_POST['Type']);
$Shade = ($_POST['Shade']);
$Size= ($_POST['Size']);
$SalesPrice= ($_POST['SalesPrice']);
					
mysqli_query($db, "UPDATE Product_13122 SET ProductCode='$ProductCode', Brand='$Brand', Type='$Type', Shade='$Shade', Size='$Size',SalesPrice='$SalesPrice' WHERE ProductCode='$ProductCode'");

$_SESSION ['msg']= "Adress updated";
header('location: product.php');
}
//delete records
if(isset($_GET['del'])){
	$ProductCode = $_GET['del'];
	mysqli_query($db, "DELETE FROM Product_13122 WHERE ProductCode='$ProductCode' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: product.php');
}


$results= mysqli_query($db, "SELECT * FROM Product_13122");
?>
