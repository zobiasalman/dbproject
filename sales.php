<?php include('serversales.php');

//fetch record to be updated
if(isset($_GET['edit'])){
$SID= $_GET['edit'];
$edit_state= true;
$rec= mysqli_query($db, "SELECT * FROM salespersons_13122 WHERE SID='$SID'");
$record = mysqli_fetch_array($rec);
$SID= $record['SID'];
$SName= $record['SName'];
$ContactNo = $record['ContactNo'];
$CID = $record['CID'];

}
 ?>

<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 70%;
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
    width: 70%;
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

  <a href='register.php'><b>Register</b></a>
  
  <a href='login.php'><b>Logut</b></a>

  <a href='ind.php'><b>Customer</b></a>

  <a href='product.php'><b>Product</b></a>

  <a class="active" href='salesinvoice.php'><b>Sales Order</b></a>


</div>

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
<th>SID</th>
<th>SName</th>
<th>ContactNo</th>
<th>CID</th>

<th colspan= "2">Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_array($results)){ ?>
<tr>
<td><?php echo $row['SID']; ?></td>
<td><?php echo $row['SName']; ?></td>
<td><?php echo $row['ContactNo']; ?></td>
<td><?php echo $row['CID'] ; ?></td>

<td>
<a class="edit_btn" href= "sales.php?edit=<?php echo $row['SID']; ?>">Edit</a>
</td>
<td>
<a class= "del_btn" href= "serversales.php?del=<?php echo $row['SID']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<form method="post" action ="serversales.php">
<input type="hidden" name ="SID" value="<?php echo $SID; ?>">

<div class="input-group">
<label>SID</label>
<input type= "text" name="SID" value="<?php echo $SID;?>"  >
</div>
<div class="input-group">
<label>SName</label>
<input type= "text" name="SName" value="<?php echo $SName;?>" >
</div>
<div class="input-group">
<label>ContactNo</label>
<input type= "text" name="ContactNo" value="<?php echo $ContactNo;?>" >
</div>
<div class="input-group">
<label>CID</label>
<input type= "text" name="CID" value="<?php echo $CID;?>" >
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
