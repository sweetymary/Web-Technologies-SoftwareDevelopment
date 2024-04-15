 <!DOCTYPE html>
<html>
    <head>
        <title>  Implement the CRUD operations(Create.php) </title>
    </head>
	<body>
	 <form action="create.php" method="post" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?> "> <br>
<br>
  <label for="description">Email:</label>
  <input id="email" name="email" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></textarea><br>
<br>
  <label for="image">Phone No:</label>
   <input type="text" id="phone" name="phone" required value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"><br>
<br>
<input type="submit" value="Create">
</form>
	
	 <?php 
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('crud_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for name .
  if ( empty( $_POST[ 'name' ] ) )
  { $errors[] = 'Enter name.' ; }
  else
  { $n = mysqli_real_escape_string( $conn, trim( $_POST[ 'name' ] ) ) ; }

  # Check for email.
  if (empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter email.' ; }
  else
  { $e = mysqli_real_escape_string( $conn, trim( $_POST[ 'email' ] ) ) ; }
  
  # Check for phone number.
  if (empty( $_POST[ 'phone' ] ) )
  { $errors[] = 'Enter phone number.' ; }
  else
  { $p = mysqli_real_escape_string( $conn, trim( $_POST[ 'phone' ] ) ) ; }
  
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (name, email, phone) 
	VALUES ('$n','$e', '$p' )";
    $r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    { echo '<p>New record created successfully</p> 
			<a href="read.php"</a>'; }
  
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