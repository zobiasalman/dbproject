<?php  

$connect = mysqli_connect("localhost", "root", "", "mysql"); 

$ORDERNO=isset($_POST["ORDERNO"])?$_POST["ORDERNO"]:"";

$CID=isset($_POST["CID"])?$_POST["CID"]:"";

$DATE=isset($_POST["DATE"])?$_POST["DATE"]:"";

$SID=isset($_POST["SID"])?$_POST["SID"]:"";

$ProductCode=isset($_POST["ProductCode"])?$_POST["ProductCode"]:"";

$QUANTITY=isset($_POST["QUANTITY"])?$_POST["QUANTITY"]:"";

//$RATE=isset($_POST["RATE"])?$_POST["RATE"]:"";

$AMOUNT=isset($_POST["AMOUNT"])?$_POST["AMOUNT"]:"";




echo 'Data: ' . $ORDERNO . $CID . $DATE . $SID . $ProductCode . $QUANTITY;




 $res = mysqli_query($connect, "SELECT SalesPrice FROM Product_13122 WHERE ProductCode='$ProductCode'");

 $row = mysqli_fetch_array($res);     

 $RATE=$row["SalesPrice"];

 echo 'RATE: ' . $RATE;

 $sql = "INSERT INTO salesorder_13122 VALUES('$ORDERNO','$CID','$DATE','$SID','$ProductCode','$QUANTITY','$RATE','$AMOUNT')";


 if(mysqli_query($connect, $sql))  

 {  

      mysqli_query($connect, "UPDATE salesorder_13122 SET AMOUNT=($RATE*$QUANTITY) WHERE ORDERNO=" .  $ORDERNO);

      echo 'Data Inserted';  

 }  
 $results= mysqli_query($connect, "SELECT * FROM salesorder_13122");

 ?> 