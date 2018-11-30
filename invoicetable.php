
<?php  

 $connect = mysqli_connect("localhost", "root", "", "mysql");  

 $output = '';  

$CID=isset($_POST["CID"])?$_POST["CID"]:"";
$RATE=isset($_POST["SalesPrice"])?$_POST["SalesPrice"]:"";
$QUANTITY=isset($_POST["QUANTITY"])?$_POST["QUANTITY"]:"";
$AMOUNT = isset($_POST['QUANTITY*RATE'])?$_POST["QUANTITY*RATE"]:"";
//$ProductCode=isset($_POST[""])?$_POST["SalesPrice"]:"";

 $sql = "SELECT * FROM salesorder_13122 WHERE CID='$CID' ORDER BY ORDERNO";  

 $sql1 = "SELECT * FROM customer_13122 WHERE CID='$CID'";

 $sql2 = "SELECT SID FROM salespersons_13122";

 $sql3 = "SELECT ProductCode FROM product_13122";
 
 

 $result = mysqli_query($connect, $sql);  

 $result1 = mysqli_query($connect, $sql1);

 $result2 = mysqli_query($connect, $sql2);

 $row = mysqli_fetch_array($result1);

 $output .= '  

<table border="1" align="center" table width="1200">

<tr style="background-color:DodgerBlue; padding: 20px;"> <th>CID</th> <th>SalesPersonName</th> <th>CustomerName</th> <th>ContactNo</th> <th>Address</th> <th>Area</th> <th>GeographicalCoordinates</th></tr>

	 

	<tr style="background-color: white; padding: 20px;">

	     <td>'.$row["CID"].'</td>

	     <td>'.$row["Sname"].'</td>

	     <td>'.$row["CName"].'</td>

	     <td>'.$row["CNO"].'</td>

	     <td>'.$row["Address"].'</td>

	     <td>'.$row["Area"].'</td>

	     <td>'.$row["GC"].'</td>

	</tr>

	</table>
	

<h3>SALE ORDER INVOICE</h3>

      <div class="table-responsive">  

           <table  class="table table-bordered"" align="center" table width="1200">  

                <tr style="background-color:DodgerBlue;">  

                     <th width="10%" style="padding: 20px;">ORDER NO.</th>  

                     <th width="40%" style="padding: 20px;">CUSTOMER ID</th>  

                     <th width="40%" style="padding: 20px;">DATE</th> 

                     <th width="40%" style="padding: 20px;">SALESPERSON ID</th>

                     <th width="40%" style="padding: 20px;">PRODUCT CODE</th>

                     <th width="40%" style="padding: 20px;">QUANTITY</th>

                     <th width="40%" style="padding: 20px;">RATE</th>

                     <th width="40%" style="padding: 20px;">AMOUNT</th> 

                     <th width="10%" style="padding: 20px;">Action</th>  

                </tr>';  

 if(mysqli_num_rows($result) > 0)  

 {  

      while($row = mysqli_fetch_array($result))  

      {  

	   $result3 = mysqli_query($connect, $sql3);

		//pcode and spid

	   $result2 = mysqli_query($connect, $sql2);

           $output .= '  

           <tr style="background-color: white; padding: 20px;">  

                     <td class="ORDERNO" data-id1="'.$row["ORDERNO"].'" contenteditable>'.$row["ORDERNO"].'</td>  

                     <td>'.$row["CID"].'</td> 

                     <td class="DATE" data-id3="'.$row["ORDERNO"].'" contenteditable>'.$row["DATE"].'</td>

                     <td>';

		     $output .= '<select class="SID form-control" data-id4="'.$row["ORDERNO"].'">';

			$output .= '<option value="">None</option>';

    			while ($row1 = mysqli_fetch_array($result2)) { 

$output .= '<option value="'.$row1["SID"].'"'.($row["SID"]==$row1["SID"]?'selected="selected"':"").'>'.$row1["SID"].'</option>';

             									}

$output .= '</select>

			</td>

                     	<td>';

		     	$output .= '<select class="ProductCode form-control" data-id5="'.$row["ORDERNO"].'">';

			$output .= '<option value="">None</option>';

    			while ($row2 = mysqli_fetch_array($result3)) { 




$output .= '<option value="'.$row2["ProductCode"].'"'.($row["ProductCode"]==$row2["ProductCode"]?'selected="selected"':"").'>'.$row2["ProductCode"].'</option>';

                  	                 

			}

    			$output .= '</select>

		     </td>

                     <td class="QUANTITY" data-id6="'.$row["ORDERNO"].'" contenteditable>'.$row["QUANTITY"].'</td>

                     <td class="RATE" data-id7="'.$row["ORDERNO"].'" contenteditable>'.$row["RATE"].'</td>

                     <td>'.$row["AMOUNT"].'</td> 

<td><button type="button" name="delete_btn" data-id9="'.$row["ORDERNO"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>

        </tr>  

           ';  

      }  

      $output .= '  

           <tr>  

                <td id="ORDERNO" contenteditable></td>  

                <td id="CID">'.$CID.'</td>  

                <td id="DATE" contenteditable></td>  

                <td>';


		$output .= '<select id="SID" class="form-control">';

		$output .= '<option value="">None</option>';

		$result2 = mysqli_query($connect, $sql2);

    		while ($row1 = mysqli_fetch_array($result2)) { 

                  $output .= '<option value="'.$row1["SID"].'">'.$row1["SID"].'</option>';                

		}

    		$output .= '</select>

		</td>  

                <td>';

		$output .= '<select id="ProductCode" class="form-control">';

		$output .= '<option value="">None</option>';

		$result3 = mysqli_query($connect, $sql3);

    		while ($row2 = mysqli_fetch_array($result3)) { 

                  $output .= '<option value="'.$row2["ProductCode"].'">'.$row2["ProductCode"].'</option>';                

		}

    		$output .= '</select>

		</td>  

                <td id="QUANTITY" contenteditable></td>  

                <td id="RATE" contenteditable></td> 
				
				<td id="AMOUNT"contenteditable></td>  ;

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">CREATE</button></td>  

           </tr>  

      ';  

 }  

 else  

 {  

$output .= '

		<tr>  

                <td id="ORDERNO" contenteditable></td>  

                <td id="CID">'.$CID.'</td>  

                <td id="DATE" contenteditable></td>  

                <td>';

		$output .= '<select id="SID" class="form-control">';

		$output .= '<option value="">None</option>';

		$result2 = mysqli_query($connect, $sql2);

    		while ($row1 = mysqli_fetch_array($result2)) { 

                  $output .= '<option value="'.$row1["SID"].'">'.$row1["SID"].'</option>';                

		}

    		$output .= '</select>

		</td>  

                <td>';

		$output .= '<select id="ProductCode" class="form-control">';

		$output .= '<option value="">None</option>';

		$result3 = mysqli_query($connect, $sql3);

    		while ($row2 = mysqli_fetch_array($result3)) { 

                  $output .= '<option value="'.$row2["ProductCode"].'">'.$row2["ProductCode"].'</option>';                

		}

    		$output .= '</select>

		</td>  

                <td id="QUANTITY" contenteditable></td>  

              <td id="RATE" contenteditable></td>   
			  
				<td id="AMOUNT"contenteditable></td> ;

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">CREATE</button></td>  

           </tr>		

<tr>  

                          <td colspan="4">Data not Found</td>  

                     </tr>';  

 }  

 $output .= '</table>  

      </div>';  

 echo $output;  

 ?>