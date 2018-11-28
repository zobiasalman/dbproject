<?php 

 $conn = mysqli_connect("localhost", "root", "Abcd#1234", "mysql"); 

$id=isset($_POST["id"])?$_POST["id"]:"";

 $sql = "DELETE FROM salesorder_13122 WHERE ORDERNO = $id"; 

 if(mysqli_query($conn, $sql)) 

 { 

 echo 'DATA DELETED SUCCESSFULLY'; 

 } 

 ?>
