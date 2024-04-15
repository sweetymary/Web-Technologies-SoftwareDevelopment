  <!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
        <title>Home </title>
		<link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">   	
    </head>
	<body>
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
	

<?php
	# Read session start file.
	include('session-cart.php');

	# Open database connection.
	require('codespace.php');
	
	echo '<div class="row">';	
	# Retrieve items from 'products' database table.
	$q = "SELECT * FROM products";
    $r = mysqli_query($conn, $q);
	if (mysqli_num_rows($r) > 0)
	{
		# Display body section.
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		{
			echo '
			<div class="col-md-3 d-flex justify-content-center">
				<div class="card" style="width: 18rem;">
					<img src="' . $row['item_img'] . '" class="card-img-top" alt="' . $row['item_name'] . '">
					<div class="card-body text-center">
						<h5 class="card-title">' . $row['item_name'] . '</h5>
						<p class="card-text">' . $row['item_desc'] . '</p>
					</div>
					<div class="card-footer bg-transparent border-dark text-center">
						<p class="card-text">&pound;' . $row['item_price'] . '</p>
					</div>
					<div class="card-footer text-muted">
						<a href="added.php?id=' . $row['item_id'] . '" class="btn btn-light btn-block">Add to Cart</a>
					</div>
				</div>
			</div>';  
		}
		# Close database connection.
		mysqli_close($conn); 
	}
	# Or display message.
	else { 
		echo '<p>There are currently no items in the table to display.</p>';
	}
?>
	

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</body>
	</html>	
	