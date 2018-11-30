<html>  

<body style="background-color:lavender">

      <head>  

           <title>SALES ORDER INVOICE</title>  

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

      </head>  

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




      <body>  

<div class="nav">

  <a href='register.php'><b>HOME</b></a>

  <a href='ind.php'><b>Customer</b></a>

  <a href='sales.php'><b>SalesPerson</b></a></a>


  <a href='product.php'><b>Product</b></a>

  <a class="active" href='salesinvoice.php'><b>Sales Order</b></a>


</div>

           <div class="container">  

                <div class="table-responsive"> 




<h3>SELECT CUSTOMER: </h3>




<?php

$host = "localhost";

$db_name = "mysql";

$username = "root";

$password = "";

$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

	$stmt = $con->prepare("select CID from Customer_13122");

	$stmt->execute();

    	echo "<select id='CID' class='form-control'>";

	echo '<option value="">None</option>';

    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 

                  echo '<option value="'.$row["CID"].'">'.$row["CID"].'</option>';                

	}

    	echo "</select>";
		
		

	?>

	</br>

<div id="live_data"></div>  

		</div>                 

           </div>  

      </body>  

 </html>  

 <script>  

 	$(document).ready(function(){  

	var CID= $('#CID').val();

	$("#CID").change(function(){

	CID = $('#CID').val();	

      	 fetch_data();

	});

	

	function fetch_data()

      {  

           $.ajax({  

                url:"invoicetable.php",  

                method:"POST",  

		data:{CID:CID},

		dataType:"text",

                success:function(data){  

                     $('#live_data').html(data);  

                }  

           });  

      }  

      fetch_data();  

      $(document).on('click', '#btn_add', function(){  

	   var ORDERNO = $('#ORDERNO').text(); 

           var CID = CID;  

           var DATE = $('#DATE').text();  

           var SID = $('#SID').val();  

           var ProductCode = $('#ProductCode').val();

           var QUANTITY1 = $('#QUANTITY').text();  

           var RATE1 = $('#RATE').text(); 

	var QUANTITY= parseInt(QUANTITY1);

	var RATE= parseInt(RATE1); 

           var AMOUNT = QUANTITY*RATE;  

           if(ORDERNO == '')  

           {  

                alert("ENTER ORDERNO");  

                return false;  

           }   

	   if(DATE== '')  

           {  

                alert("ENTER DATE");  

                return false;  

           }  

           if(QUANTITY == '')  

           {  

                alert("ENTER QUANTITY");  

                return false;  

           }    


                $.ajax({  

                url:"invoiceinsert.php",  

                method:"POST",  

                data:{ORDERNO:ORDERNO, CID:CID,DATE:DATE,SID:SID, ProductCode:ProductCode, QUANTITY:QUANTITY, RATE:RATE,AMOUNT:AMOUNT},  

                dataType:"text",  

                success:function(data)  

                {  

                    // alert(data);  

                     fetch_data();  

                }  

           })  

      });  

      function edit_data(id, text, column_name)  

      {  

           $.ajax({  

                url:"invoiceedit.php",  

                method:"POST",  

                data:{id:id, text:text, column_name:column_name},  

                dataType:"text",  

                success:function(data){  

                    // alert(data);  

			fetch_data();

                }  

           });  

      }  




      $(document).on('blur', '.ORDERNO', function(){  

           var id = $(this).data("id1");  

           var ORDERNO= $(this).text();  

           edit_data(id, ORDERNO, "ORDERNO");  

      });  

      $(document).on('blur', '.DATE', function(){  

           var id= $(this).data("id3");  

           var DATE = $(this).text();  

           edit_data(id,DATE, "DATE");  

      });  

      $(document).on('blur', '.SID', function(){  

           var id = $(this).data("id4");  

           var SID = $(this).text();  

           edit_data(id,SID, "SID");  

      });  

      $(document).on('blur', '.ProductCode', function(){  

           var id = $(this).data("id5");  

           var ProductCode = $(this).text();  

           edit_data(id,ProductCode, "ProductCode");  

      });  

      $(document).on('blur', '.QUANTITY', function(){  

           var id = $(this).data("id6");  

           var QUANTITY= $(this).text();  

           edit_data(id,QUANTITY, "QUANTITY");  

      });  

      $(document).on('blur', '.Rate', function(){  

           var id = $(this).data("id7");  

           var RATE = $(this).text();  

           edit_data(id,RATE, "RATE");  

      });  

      $(document).on('click', '.btn_delete', function(){  

           var id=$(this).data("id9");  

           if(confirm("PRESS TO DELETE?"))  

           {  

                $.ajax({  

                    url:"invoicedelete.php",  

                    method:"POST",  

                    data:{id:id},  

                    dataType:"text",  

                    success:function(data)

					{  

						fetch_data();  

                    }  

                });  

           }  

      });  

 });  

 </script>


