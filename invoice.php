<?php include('serverinvoice.php'); 

$statement=$connect->prepare(" 
SELECT * FROM order_13122 ORDER BY ORDERID DESC
");

$statement-> execute();
$all_result= $statement-> fetchAll();
$total_rows=$statement->rowCount();
?>


<!DOCTYPE html>
<head>
<title></title>
<meta charset="utf-8">
<meta name ="viewport" content= width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">

<style>
.navbar{
	margin-bottom: 4px;
	border-radius:0;
	
}
footer{
	
	background-color: #f2f2f2;
	padding: 25px
}
.navbar-brand{
	padding: 5px 40px;
	}
.navbar-brand: hover
{
	background-color: #ffffff;
	
}
</style>
</head>
<body>
<style>
.box{
	width: 100%;
	max-width: 1390px;
	border-radius: 5px;
	border: 1px solid #ccc;
	padding: 15px;
	margin:0 auto;
	margin-top: 50px;
	box-sizing:border-box;
}
</style>

<div class="container-fluid>
<?php 
if (isset($_GET["add"])){
	
?>
<form method = "post" id="invoice_form">
<div class="table-responsive">
<table class= "table table-bordered">
<tr>
<td> colspan="2" align="center"><h2 style="margin-top:10.5px"> CREATE INVOICE </h2></td>
</tr>

<tr>
<td colspan="2">
<div class="row">
<div class="col-md-8">
TO, <br />
<b>RECEIVER (BILL TO) </b><br />
<input type="text" name="CID" id="CID" class="form-control input-sm" placeholder="ENTER RECEIVER ID" />
<div class = "col-md-4">
REVERSE CHARGE<br />
<input type="text" name="ORDERID" id="ORDERID" class="form-control input-sm" placeholder="ENTER ORDER ID" />
<input type="text" name="ORDERDATE" id="ORDERDATE" class="form-control input-sm" readonly placeholder="SELECT INVOICE DATE" />

</div>
</div>

<table id="invoice-item-table" class="table table-bordered">
<tr>
<th> ORDERITEMID </th>
<th> ITEMNAME </th>
<th> QUANTITY </th>
<th> PRICE </th>
<th colspan="2">TAXRATE (%)</th>
<th colspan="2">TAXAMT (%)</th>
<th rowspan="2">TOTALAMT </th>
<th rowspan="2"> </th>
</tr>

<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>RATE</th>
<th>AMT</th>
</tr>

<tr>
<td><span id="ORDERITEMID">1</span></td>
<td><input type ="text" name="ITEMNAME[]" id= "ITEMNAME1" class="form-control input-sm /></td>
<td><input type ="text" name="QUANTITY[]" id= "QUANTITY1" data-srno="1" class="form-control input-sm QUANTITY /></td>
<td><input type ="text" name="PRICE[]" id= "PRICE1" data-srno="1" class="form-control input-sm number_only PRICE /></td>
<td><input type ="text" name="TAXRATE[]" id= "TAXRATE1" data-srno="1" class="form-control input-sm number_only TAXRATE /></td>
<td><input type ="text" name="TAXAMT[]" id= "TAXAMT1" data-srno="1" readonly class="form-control input-sm TAXAMT /></td>
<td><input type ="text" name="TOTALAMT[]" id= "TOTALAMT1" data-srno="1" readonly class="form-control input-sm TOTALAMT /></td>

</tr>


</table>
<div align="center">
<button type="button" name="add_row" id=""add_row" class="btn btn-success btn-xs>+</button>
</div>

</td>
</tr>

<tr>
<td align="right"><b>TOTAL</td>
<td align="right"><b><span id="TOTALAMT"></span></b></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>

<tr>
<td colspan="2" align="center">
<input type ="hidden" name ="total_item" id="total_item" value ="1" />
<input type="submit" name ="create_invoice" id="create_invoice" class="btn btn-info" value= "CREATE" />
</td>
</tr>


</table>

</div>
</form>
<?php 
}
else{
	
}
?>

<h3 align= "center">INVOICE LIST</h3><br/>
<div align= "right">
<a href="invoice.php?add=1" class="btn btn -info btn-xs">CREATE</a>


</div>
<br/>

<table id= "data-table" class = "table table-bordered table-striped">
<thead>
<tr>
<th>ORDERID</th>
<th>ORDERDATE</th>
<th>CID</th>
<th>AFTERTAX</th>
<th>PDF</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
</thead>
<?php 
if ($total_rows > 0){
	
	foreach($all_result as $row){
		echo'
		<tr>
		<td> '.$row["ORDERID"].' </td>
		<td> '.$row["ORDERDATE"].' </td>
		<td> '.$row["CID"].' </td>
		<td> '.$row["AFTERTAX"].' </td>
		<td><a href="print_invoice.php?pdf=1&id=' .$row["ORDERID"].'">PDF</a></td>
		<td><a href="invoice.php?update=1&id=' .$row["ORDERID"].'">span class="glyphicon glyphicon-edit"></span></a></td>
		<td><a href="#" id=" ' .$row["ORDERID"].'"> class="delete"><span class ="glyphicon glyphicon-remove"></span></a></td>
		
		</tr>
		';
		
	}
}

?>



</table>
<?php 



?>

</div>

<br>
<footer class="container-fluid text-center">
<p>FOOTER TEXT</p>
</footer>
</body>
</html>










