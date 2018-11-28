<?php include('serverlogin.php'); ?>

<!DOCTYPE html>
<style>
body{
	font-size: 120%;
	background: #F8F8FF;
}
.header{
	width: 30%;
	margin: 50px auto 0px;
    color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
    padding: 20px;	
}
form{
    width: 30%;
	margin: 0px auto;
	padding: 20px;
    border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px ;
    	}
.input-group{
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input{
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
	}
.btn{
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
	
}
.success{
	color: #3c763d;
	background: #dff0d8;
	border: 1px solid #3c763d;
	margin-bottom: 20px;
	
	
	
}
</style>
<head>
<title>User Login</title>
</head>
<body>

<div class="header">
<h2>Home Page</h2>
</div>

<div class= "content">
<?php if(isset($_SESSION['success'])): ?>

<div class= "error success">
<h3>
<?php 
echo $_SESSION['success'];
unset($_SESSION['success']);
?>

</h3>
</div>
<?php endif ?>
<?php if(isset($_SESSION['username'])): ?>
<p>WELCOME <strong><?php echo $_SESSION['username']; ?></strong></p>
<p><a href="home.php?logout='1'" style="color: red;" >Logout</a></p>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>


<div class="topnav">
<p><a class="active" href="sales.php">Sales Person</a></p>
<p><a href="product.php">Products</a></p>
<p><a href="ind.php">Customer</a></p>
<p><a href="register.php">Register</a></p>
</div>





<?php endif ?>
</div>








</body>
</html>
