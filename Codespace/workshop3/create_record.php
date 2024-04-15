<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
        <title> CRUD Practice!(Create reord) </title>
		<link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">   	
    </head>
	
	<style>
	 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'roboto', aclonica;
	list-style: none;
  }
	
	.container {
    max-width: 1080px;
    padding: 0 3rem;
    }
    .h2 {
    color: black;
    line-height: 1.2;
    font-weight: 500;
  }
   .row {
      display: flex;
      align-items: left;
      flex-wrap: wrap;
      padding: 0 7px;
    }

.column {
      flex: 10%;
      max-width: 60%;
      padding: 20px;
    }
 .col-2 {
      flex-basis: 50%;
      min-width: 300px;
 }
	
	</style>

  <body>
  <h2> Add Item</h2>
  <div class="container">
<form action="create_record.php" method="post" enctype="multipart/form-data">
<div class="row">
	<div class="col-2">
	<div class="form-group>
  <label for="name">Item Name:</label>
  <input type="text" id="item_name" name="item_name" style="width: 100%" required value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> "> <br>
 <br>
 </div>
 <div class="form-group>
  <label for="description">Description:</label>
  <textarea id="item_desc" name="item_desc" style="width: 100%" required value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>"></textarea><br>
 <br>
 </div>
 <div class="form-group>
  <label for="image">Image:</label>
   <input type="text" id="item_img" name="item_img" style="width: 100%" required value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>"><br>
	<img src="./Codespace/workshop4/product-1.png" style="width: 20%" alt=" ">
	<img src="./Codespace/workshop4/product-2.png" style="width: 20%" alt=" " >
	<img src="./Codespace/workshop4/product-3.png" style="width: 20%" alt=" " >
	<img src="./Codespace/workshop4/product-7.png" style="width: 20%" alt=" " >
  <br>
  <br>
  </div>
  <div class="form-group>
  <label for="price">Price:</label>
  <input type="number" id="item_price" name="item_price" style="width: 100%" min="0" step="0.01" required value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>
  <br>
  </div>
  <br>
  <input type="submit" value="Submit">
</form>
</div>
</div>
</div>

<?php 
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('codespace.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for item name .
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Enter the item name.' ; }
  else
  { $n = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item decription.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Enter the item decription.' ; }
  else
  { $d = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_desc' ] ) ) ; }
  
  # Check for a item image.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Enter the item image.' ; }
  else
  { $img = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Enter the item image.' ; }
  else
  { $p = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_price' ] ) ) ; }

	
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
	VALUES ('$n','$d', '$img', '$p' )";
    $r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    { echo '<p>New record created successfully</p>
		<a href="create_record.php">Add Records</a>  |  <a href="read_table.php">Read Records</a>  |  <a href="update_record.php">Update Record</a>  | <a href="delete_record.php">Delete Record</a>'; }
  
    # Close database connection.
    mysqli_close($conn); 

    exit();
  }
   
  # Or report errors.
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $conn );
	
  }  
}
?>
    
 
</body>
</html>
