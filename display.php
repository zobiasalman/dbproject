<html>
<head>
</head>
<body>

<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname="zobia13122";

//create connection
$conn= mysqli_connect($servername, $username, $password, $dbname);
//check connection
if(!$conn) {
die("Connection Failed: " . mysqli_connect_error());
}

$sql= "SELECT CID, Sname, CName, CNO, Address, Area, GC FROM customer_13122";
$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result))  {
echo "CustomerID: " . $row["CID"]. " SName: " . $row["Sname"]. "CName: " .$row["CName"]. "CNO: " .$row["CNO"] . "Address: ".$row["Address"]. "Area: " .$row["Area"]. "GC: " .$row["GC"]. "<br>";
}
} else {
echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>

