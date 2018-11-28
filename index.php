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

$sql= "SELECT CID, Sname, CName, CNO, Address, Area, GC FROM customer_13122";
$result= $conn->query($sql);

if($result->num_rows > 0){
echo "<table><tr><th>CustomerID</th><th>SalesPersonName</th><th>CustomerName</th><th>ContactNo</th><th>Address</th><th>Area</th><th>Geographical Coordinates</th></tr>";

//output data of each row
while($row = $result->fetch_assoc()){
echo "<tr><td>" .$row["CID"]. "</td><td>". $row["Sname"]."</td><td> ".$row["CName"]. "</td><td> ".$row["CNO"]."</td><td> ".$row["Address"]."</td><td> ".$row["Area"].
"</td><td> ".$row["GC"]."</td></tr>";
}

echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>

</body>
</html>
