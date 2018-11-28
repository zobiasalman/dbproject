<?php include('serveruser.php');

//fetch record to be updated
if(isset($_GET['edit'])){
$UserID= $_GET['edit'];
$edit_state= true;
$rec= mysqli_query($db, "SELECT * FROM User_13122 WHERE UserID='$UserID'");
$record = mysqli_fetch_array($rec);
$UserID= $record['UserID'];
$Password= $record['Password'];
$Active = $record['Active'];
$SalesPerson = $record['SalesPerson'];

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
<th>UserID</th>
<th>Password</th>
<th>Active</th>
<th>SalesPerson</th>

<th colspan= "2">Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_array($results)){ ?>
<tr>
<td><?php echo $row['UserID']; ?></td>
<td><?php echo $row['Password']; ?></td>
<td><?php echo $row['Active']; ?></td>
<td><?php echo $row['SalesPerson'] ; ?></td>

<td>
<a class="edit_btn" href= "user.php?edit=<?php echo $row['UserID']; ?>">Edit</a>
</td>
<td>
<a class= "del_btn" href= "serveruser.php?del=<?php echo $row['UserID']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<form method="post" action ="serveruser.php">
<input type="hidden" name ="UserID" value="<?php echo $UserID; ?>">

<div class="input-group">
<label>UserID</label>
<input type= "text" name="UserID" value="<?php echo $UserID;?>"  >
</div>
<div class="input-group">
<label>Password</label>
<input type= "text" name="Password" value="<?php echo $Password;?>" >
</div>
<div class="input-group">
<label>Active</label>
<input type= "text" name="Active" value="<?php echo $Active;?>" >
</div>
<div class="input-group">
<label>SalesPerson</label>
<input type= "text" name="SalesPerson" value="<?php echo $SalesPerson;?>" >
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