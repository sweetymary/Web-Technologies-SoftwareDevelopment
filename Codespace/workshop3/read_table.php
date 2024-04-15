<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
     
	
<?php 
	
	# Connect to the database.
	  require ('codespace.php'); 
	  
//Query to fetch records from the database
    $q = "SELECT * FROM products;" ;
    $r = @mysqli_query ( $conn, $q ) ;
	
//Check if thereare any records returned
    if ( mysqli_num_rows( $r ) != 0 ) 
		
		{
echo '
<h1>Read Items</h1>
<table class="table">
<thead>
<tr><th>Item ID</th><th>Item Name</th><th>Description</th><th>Image</th><th>Price</th></tr></thead><tbody>';
			
while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
echo'<tr>
<td>'.$row['item_id'].' </td><td>'.$row['item_name'].' </td><td>'.$row['item_desc'].'</td><td><img src="'.$row['item_img'].'" alt="product" width="50"   height="50"></td><td>£'.$row['item_price'].'</td>
			';
		}
		
echo'</tr></table></br><br><a href="create_record.php">Add Records</a>  |  <a href="read_table.php">Read Records</a>  |  <a href="update_record.php">Update Record</a>  | <a href="delete_record.php">Delete Record</a>';}
	
# Close database connection.
  mysqli_close($conn); 
  exit();
?>





 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
		
	<script src=" 
https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity=" 
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"> 
</script>     
 </body>
</html> 