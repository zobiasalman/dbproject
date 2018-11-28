<?php include('serverproduct.php');

//fetch record to be updated
if(isset($_GET['edit'])){
$ProductCode = $_GET['edit'];
$edit_state= true;
$rec= mysqli_query($db, "SELECT * FROM Product_13122 WHERE ProductCode='$ProductCode'");
$record = mysqli_fetch_array($rec);
$ProductCode= $record['ProductCode'];
$Brand= $record['Brand'];
$Type = $record['Type'];
$Shade = $record['Shade'];
$Size= $record['Size'];
$SalesPrice= $record['SalesPrice'];

}
 ?>

<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=text]:focus {
    background-color: lightblue;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 5px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: centre;
    padding: 5px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
.edit_btn{
	text-decoration: none;
	padding: 2px 5px;
	background: #2E8B57;
	color: white;
	border-radius: 3px;
	}
.del_btn{
	text-decoration: none;
	padding: 2px 5px;
	color: white;
	border-radius: 3px;
	background: #800000;
	
	}

</style>

<head>

    <title>Create, Update, Delete</title>
</head>
<body>

<?php if(isset($_SESSION['msg'])): ?>
<div class = "msg">
<?php 
echo $_SESSION['msg'];
unset($_SESSION['msg']);
?>
</div>
<?php endif ?>

<table>
<thead>
<tr>
<th>ProductCode</th>
<th>Brand</th>
<th>Type</th>
<th>Shade</th>
<th>Size</th>
<th>SalesPrice</th>

<th colspan= "2">Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_array($results)){ ?>
<tr>
<td><?php echo $row['ProductCode']; ?></td>
<td><?php echo $row['Brand']; ?></td>
<td><?php echo $row['Type'] ; ?></td>
<td><?php echo $row['Shade']; ?></td>
<td><?php echo $row['Size'];  ?></td>
<td><?php echo $row['SalesPrice']; ?></td>

<td>
<a class="edit_btn" href= "product.php?edit=<?php echo $row['ProductCode']; ?>">Edit</a>
</td>
<td>
<a class= "del_btn" href= "serverproduct.php?del=<?php echo $row['ProductCode']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<form method="post" action ="serverproduct.php">
<input type="hidden" name ="ProductCode" value="<?php echo $ProductCode; ?>">

<div class="input-group">
<label>ProductCode</label>
<input type= "text" name="ProductCode" value="<?php echo $ProductCode;?>"  >
</div>
<div class="input-group">
<label>Brand</label>
<input type= "text" name="Brand" value="<?php echo $Brand;?>" >
</div>
<div class="input-group">
<label>Type</label>
<input type= "text" name="Type" value="<?php echo $Type;?>" >
</div>
<div class="input-group">
<label>Shade</label>
<input type= "text" name="Shade" value="<?php echo $Shade;?>" >
</div>
<div class="input-group">
<label>Size</label>
<input type= "text" name="Size" value="<?php echo $Size;?>" >
</div>
<div class="input-group">
<label>SalesPrice</label>
<input type= "text" name="SalesPrice" value="<?php echo $SalesPrice;?>" >
</div>

<div class="input-group">

<?php if($edit_state==false): ?>
<button type="submit" name="save" class="btn">Save</button>
<?php else: ?>
<button type="submit" name="update" class="btn">Update</button>
<?php endif ?>


</div>
</form>

</body>
</html>