 <!DOCTYPE html>
 <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Trending Clothes</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body>
 <?php 
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a class="alert-link" href="register.php">Register</a></p>
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
  </div>' ;
}
?>

<!-- Display body section. -->
<div class="row">
  <div class="col-sm">
	<div class="card bg-light mb-3">
	  <div class="card-header"><h1>Login</h1>
		<div class="card-body">
		<form action="login_action.php" method="post">
		<div class="form-group">
			<label for="input email">Email</label>
            <label>
                <input type="text" name="email" class="form-control" required placeholder="* Enter Email">
            </label>
        </div>
		<div class="form-group">
		<label for="input password">Password</label>
            <label>
                <input type="password" name="pass"  class="form-control" required placeholder="* Enter Password">
            </label>
        </div>
		<input type="submit" class="btn btn-dark btn-lg btn-block" value="Login" >


</form><!-- closing form -->
			</div><!-- closing card header -->
		</div><!-- closing card -->
	  </div><!-- closing col -->
	</div><!-- closing row -->
	  </div><!-- closing container -->				
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	
  </body>
</html>