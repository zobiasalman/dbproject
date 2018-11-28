
<?php

//initialize
$cid = "";
$sname = "";
$cname= "";
$cno= "";
$address = "";
$area= "";
$gc= "";

//create connection
$con= mysqli_connect('localhost', 'root' , 'Abcd#1234' , 'mysql');
if (isset($_POST['submit'])){

$cid= $_POST['cid'];
$sname= $_POST['sname'];
$cname= $_POST['cname'];
$cno= $_POST['cno'];
$address= $_POST['address'];
$area= $_POST['area'];
$gc= $_POST['gc'];

$query = "INSERT INTO customer_13122(CID, Sname, CName, CNO,  Address, Area, GC)
VALUES
('$cid' , '$sname' , '$cname' , '$cno',  '$address' , '$area', '$gc')";

mysqli_query($conn, $query);
header('location: create.php');

}

?>


