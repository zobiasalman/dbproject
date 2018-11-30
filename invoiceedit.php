<?php

 $connect = mysqli_connect("localhost", "root", "", "mysql"); 

$id=isset($_POST["id"])?$_POST["id"]:"";

$text=isset($_POST["text"])?$_POST["text"]:"";

$column_name=isset($_POST["column_name"])?$_POST["column_name"]:"";

$query = "UPDATE salesorder_13122 SET ".$column_name."='".$text."' WHERE OREDERNO='".$id."'";

if($column_name=='ProdCode'){

	$res = mysqli_query($connect, "SELECT SalesPrice FROM Product13122 WHERE ProductCode='".$text."'");

	$row = mysqli_fetch_array($res);

	mysqli_query($connect, "UPDATE salesorder_13122 SET RATE='".$row['SalesPrice']."' WHERE ORDERNO='".$id."'");

}  

if(mysqli_query($connect, $query))

 {

      mysqli_query($connect, "UPDATE salesorder_13122 SET AMOUNT=RATE*QUANTITY WHERE ORDERNO='".$id."'");

  echo 'Data Updated';

 }

?>