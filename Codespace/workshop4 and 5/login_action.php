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

 .h1 {
    color: black;
    line-height: 1.2;
    font-weight: 500;
    center-top: auto;
  }

  .container {
    max-width: 1080px;
    padding: 0 3rem;
    margin: auto;
    }
	
	
	</style>
	
	<body>
	<div class="container">
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
</div>
<br>
<br>
<div class="container">
<h1> Login </h1>
	<form action="login_action.php" method="post" enctype="multipart/form-data" style="margin-left: 20px">
  <div class="form-group">
	<label for="inputemail">Email</label>
	<input type="text" name="email" class="form-control" required placeholder="* Enter Email" style="width: 40%"> 
  </div>
  <div class="form-group">
  <label for="inputpassword">Password</label>
	<input type="password" name="pass"  class="form-control" required placeholder="* Enter Password" style="width: 40%"></p>
  </div>
	<input type="submit" class="btn btn-dark btn-lg btn-block" value="Login"  style="width: 40%">
</form>
</div>


<?php 
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'codespace.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $conn, $_POST[ 'email' ], ($_POST[ 'pass' ]) ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    load ( 'home.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $conn ) ; 
}

# Continue to display login page on failure.
include ( 'login.php' ) ;

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