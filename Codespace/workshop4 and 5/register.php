<!DOCTYPE html>
<html>
    <head>
	 <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
    
        <title> Creating a User Account </title>
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
	
	.container text-center {
    max-width: 1080px;
    padding: 0 3rem;
    margin: auto;
    }
    .h1 {
    color: black;
    line-height: 1.2;
    font-weight: 500;
    center-top: auto;
  }
   .row {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      padding: 0 7px;
      justify-content: space-around;
	  transition: transform 0.5s;
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
	input[type=text email tel] {
    width: 40%;
    border: 2px solid black;
    padding: 10px 20px;
    margin: 15px;
    font-size: 0 5px;
    box-sizing: border-box;
  }

  input[type=submit] {
    width: 50%;
    text-align: center;
    color: white;
    padding: 10px 10px;
    font-size: 0 5px;
  }

	
	</style>
	
<body>
	<h1> User account </h1>
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Trending Clothes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="register.php">Create Account<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login_action.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<br>
<div class="container text-center">
	 <form action="register.php" method="post" enctype="multipart/form-data">
  <div class="row">
   <div class="col-2">
    <div class="form-group">
     <label for="inputfirst_name">First Name</label>
     <input type="text" name="first_name" class="form-control" placeholder="* First Name " value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
    </div>
   </div>
   <!--closing col-->
	<div class="col-2">
     <div class="form-group">
      <label for="inputlast_name">Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="* Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
    </div>
   </div><!--closing col-->
	</div class="col-2">
    <div class="form-group">
      <label for="inputemail" style="position: center">Email</label>
      <input type="email" name="email" class="form-control" placeholder="* email@example.com" style="margin: 10px" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    </div>
      <small id="emailHelp" class="form-text text-muted">*We'll never share your email with anyone else.</small>
    <br>
	</div >
	</div><!--closing row-->
<div class="row">
  <div class="col-2">
    <div class="form-group">
      <label for="inputpass1">Create New Password</label>
      <input type="password" name="pass1" class="form-control" placeholder="* Create New Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
    </div>
   </div><!-- closing col-->
   <div class="col-2">
    <div class="form-group">
      <label for="inputpass2">Confirm Password</label>
      <input type="password" name="pass2" class="form-control" placeholder="* Confirm Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
    </div>
   </div><!--closing col-->
  </div><!-- closing row -->
<hr>
  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
				<input type="submit" class="btn btn-dark btn-sm btn-block" value="Create Account Now" style="margin-left: 40px; width: 90%"></p>
</form><!-- closing form -->
 
 
<?php 
# DISPLAY COMPLETE REGISTRATION PAGE.

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('codespace.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $conn, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $conn, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $conn, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $conn, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $conn, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
  

  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', SHA2('$p',256), NOW() )";
    $r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    { echo '<div class="container">
<div class="alert alert-secondary" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
  </button>
    <h4 class="alert-heading"Registered!</h4>
    <p>You are now registered.</p>
    <a class="alert-link" href="login.php">Login</a>'; }
  
    # Close database connection.
    mysqli_close($conn); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="container">
	   <div class="alert alert-secondary" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		 <span aria-hidden="true">×</span>
	      </button>
		<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $conn );
  }  
}
?>
        
<script src=" 
https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity=" 
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"> 
</script> 
    
<script src=" 
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity= 
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"> 
</script> 
    
<script src=" 
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"  
    integrity= 
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous">    
    
	
	</body>
	</html>