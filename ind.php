<?php include('server.php');

//fetch record to be updated
if(isset($_GET['edit'])){
$cid = $_GET['edit'];
$edit_state= true;
$rec= mysqli_query($db, "SELECT * FROM customer_13122 WHERE CID='$cid'");
$record = mysqli_fetch_array($rec);
$cid= $record['CID'];
$sname= $record['Sname'];
$cname = $record['CName'];
$cno = $record['CNO'];
$address= $record['Address'];
$area= $record['Area'];
$gc= $record['GC'];
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
<th>CID</th>
<th>Sname</th>
<th>CName</th>
<th>CNO</th>
<th>Address</th>
<th>Area</th>
<th>GC</th>
<th colspan= "2">Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_array($results)){ ?>
<tr>
<td><?php echo $row['CID']; ?></td>
<td><?php echo $row['Sname']; ?></td>
<td><?php echo $row['CName'] ; ?></td>
<td><?php echo $row['CNO']; ?></td>
<td><?php echo $row['Address'];  ?></td>
<td><?php echo $row['Area']; ?></td>
<td><?php echo $row['GC']; ?></td>
<td>
<a class="edit_btn" href= "ind.php?edit=<?php echo $row['CID']; ?>">Edit</a>
</td>
<td>
<a class= "del_btn" href= "server.php?del=<?php echo $row['CID']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<form method="post" action ="server.php">
<input type="hidden" name ="cid" value="<?php echo $cid; ?>">

<div class="input-group">
<label>CID</label>
<input type= "text" name="cid" value="<?php echo $cid;?>"  >
</div>
<div class="input-group">
<label>Sname</label>
<input type= "text" name="sname" value="<?php echo $sname;?>" >
</div>
<div class="input-group">
<label>CName</label>
<input type= "text" name="cname" value="<?php echo $cname;?>" >
</div>
<div class="input-group">
<label>CNO</label>
<input type= "text" name="cno" value="<?php echo $cno;?>" >
</div>
<div class="input-group">
<label>Address</label>
<input type= "text" name="address" value="<?php echo $address;?>" >
</div>
<div class="input-group">
<label>Area</label>
<input type= "text" name="area" value="<?php echo $area;?>" >
</div>
<div class="input-group">
<label>GC</label>
<input type= "text" name="gc" value="<?php echo $gc;?>" >
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