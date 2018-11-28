<html>
<head>
<style>
table, th, td{
border: 1px solid black;
}
</style>
</head>
<body>

<?php

//set variables to empty values
$cid="CID";
$sname="Sname";

$CIDErr = $SnameErr="";
$cid = $sname  ="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($_POST["cid"])){
$CIDErr = "CustomerID is required";
} else {
$cid = test_input($_POST["cid"]);
}

if(empty($_POST["sname"])){
$SnameErr = "SalesPersonName is required";
} else {
$sname = test_input($_POST["sname"]);
}
}

function test_input($data){
$data= trim($data);
$data= stripslashes($data);
$data= htmlspecialchars($data);
return $data;
}
?>

<h2>PHP TABLE VALIDATION</h2>
<p><span class = "error">* required field</span></p>
<table method="post" action= "<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">

CustomerID: <input type= "text" name="cid" value= "<?php echo $cid;?>">
<span class= "error">* <?php echo $CIDErr; ?></span>
<br><br>

SalesPersonName: <input type="text" name="sname" value= "<?php echo $sname;?>">
<span class="error"><?php echo $SnameErr;?></span>
<br><br>

<input type = "submit" name="submit" value = "Submit">
</table>

<?php
echo "<h2> Display Table :</h2>";
echo $cid;
echo "<br>";
echo $sname;
echo "<br>";
?>

<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname="mysql";

//create connection
$conn= new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error) {
die("Connection Failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customer_13122(CID, Sname, CName, Address, Area, GC)
VALUES
('$_POST[CID]' , '$_POST[Sname]')";
if(!mysql_query($sql,$conn))
{
die('Error: ' . mysql_error());
}
echo "1 record added";

$conn->close();
?>
</body>
</html>






$cid = mysqli_real_escape_string($link, $_REQUEST['cid']);
$sname = mysqli_real_escape_string($link, $_REQUEST['sname']);
$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
$cno = mysqli_real_escape_string($link, $_REQUEST['cno']);
$address = mysqli_real_escape_string($link, $_REQUEST
$area = mysqli_real_escape_string($link, $_REQUEST['area']);
$gc = mysqli_real_escape_string($link, $_REQUEST['gc']);

