<!DOCTYPE html>
<html>
    <head>
	 <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
        <title> Connecting MySQL to Database </title>
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
      max-width: 40%;
      padding: 20px;
    }
 .col-2 {
      flex-basis: 50%;
      min-width: 300px;
 }
	
	</style>
	<body>
	<div class="container">
	<h2>Update Item</h2>
	<form action="update_record.php" method="post">
	<div class="row">
	<div class="col-2">
	<div class="form-group>
  <label for="item_id">Update Item ID</label>
  <input type="text" name="item_id" style="width: 100%" value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>"> 
  </div>
 <br>
 <div class="form-group">
  <label for="item_name">Update Item Name</label>
  <input type="text" name="item_name" style="width: 100%" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">
</div>  
 <br>
 <div class="form-group">
  <label for="item_desc">Update Item Description</label>
  <input type="text" name="item_desc" style="width: 100%" value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
  </div>
 <br>
 <br>
 <div class="gorm-group">
  <label for="item_img">Update Item Image</label>
  <input type="text" name="item_img" style="width: 100%" value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
  </div>
 <br>
  <label for="item_desc">Update Item Price</label>
  <input type="text" name="item_price" style="width: 100%" value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">
 <br>
 <br>
  <input type="submit" value="Update Record"></p>
</form><!-- closing form -->
</div>
</div>
 <br>
  <a href="create_record.php">Add Records</a>  |  <a href="read_table.php">Read Records</a>  |  <a href="update_record.php">Update Record</a>  | <a href="delete_record.php">Delete Record</a>
  </div>
    
	
	<?php
	
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('codespace.php'); 
  
  # Initialize an error array.
  $errors = array();

# Check for a item id.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_id' ] ) ) ; }
  
  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_desc' ] ) ) ; }

# Check for a item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $conn, trim( $_POST[ 'item_price' ] ) ) ; }
 if ( empty( $errors ) ) 
  {
    $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
    $r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    {
       header("Location: read_table.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
  
    # Close database connection.
    
	mysqli_close($conn); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
	<p>' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</p>';
    # Close database connection.
    mysqli_close( $conn );
  } 
  

}
?>

</body>
</html>