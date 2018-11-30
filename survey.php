<?php include('serversurvey.php');

//fetch record to be updated
if(isset($_GET['edit'])){
$SHOPID = $_GET['edit'];
$edit_state= true;
$rec= mysqli_query($db, "SELECT * FROM survey13122 WHERE SHOPID='$SHOPID'");
$record = mysqli_fetch_array($rec);
$SHOPID= $record['SHOPID'];
$SHOPNAME= $record['SHOPNAME'];
$SNAME = $record['SNAME'];
$SHOPDESC = $record['SHOPDESC'];
$DATE= $record['DATE'];
$TIME= $record['TIME'];

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
<div class="nav">

  <a href='register.php'><b>HOME</b></a>

  <a href='ind.php'><b>Customer</b></a>

  <a href='sales.php'><b>SalesPerson</b></a></a>


  <a href='product.php'><b>Product</b></a>

  <a class="active" href='salesinvoice.php'><b>Sales Order</b></a>


</div>

<head>

    <title>SURVEY</title>
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
<th>SHOPID</th>
<th>SHOPNAME</th>
<th>SNAME</th>
<th>SHOPDESC</th>
<th>DATE</th>
<th>TIME</th>


<th colspan= "2">Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_array($results)){ ?>
<tr>
<td><?php echo $row['SHOPID']; ?></td>
<td><?php echo $row['SHOPNAME']; ?></td>
<td><?php echo $row['SNAME'] ; ?></td>
<td><?php echo $row['SHOPDESC']; ?></td>
<td><?php echo $row['DATE'];  ?></td>
<td><?php echo $row['TIME']; ?></td>

<td>
<a class="edit_btn" href= "survey.php?edit=<?php echo $row['SHOPID']; ?>">Edit</a>
</td>
<td>
<a class= "del_btn" href= "serversurvey.php?del=<?php echo $row['SHOPID']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<form method="post" action ="serversurvey.php">
<input type="hidden" name ="SHOPID" value="<?php echo $SHOPID; ?>">

<div class="input-group">
<label>SHOPID</label>
<input type= "text" name="SHOPID" value="<?php echo $SHOPID;?>"  >
</div>
<div class="input-group">
<label>SHOPNAME</label>
<input type= "text" name="SHOPNAME" value="<?php echo $SHOPNAME;?>" >
</div>
<div class="input-group">
<label>SNAME</label>
<input type= "text" name="SNAME" value="<?php echo $SNAME;?>" >
</div>
<div class="input-group">
<label>SHOPDESC</label>
<input type= "text" name="SHOPDESC" value="<?php echo $SHOPDESC;?>" >
</div>
<div class="input-group">
<label>DATE</label>
<input type= "text" name="DATE" value="<?php echo $DATE;?>" >
</div>
<div class="input-group">
<label>TIME</label>
<input type= "text" name="TIME" value="<?php echo $TIME;?>" >
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
</html>