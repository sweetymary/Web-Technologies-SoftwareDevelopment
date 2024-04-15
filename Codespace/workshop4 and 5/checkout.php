<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
        <title>Checkout </title>
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
<?php # DISPLAY CHECKOUT PAGE.
include ('session-cart.php');
# Check for passed total and cart.
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
  # Open database connection.
  require ('codespace.php');
  
  # Store buyer and order total in 'orders' database table.
  $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
  $r = mysqli_query ($conn, $q);
  
  # Retrieve current order number.
  $order_id = mysqli_insert_id($conn) ;
  
  # Retrieve cart items from 'products' database table.
  $q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($conn, $q);
 
  # Store order contents in 'order_content' database table.
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO order_content ( order_id, item_id, quantity, price )
    VALUES ( $order_id, ".$row['item_id'].",".$_SESSION['cart'][$row['item_id']]['quantity'].",".$_SESSION['cart'][$row['item_id']]['price'].")" ;
    $result = mysqli_query($conn,$query);
  }
  
  # Close database connection.
  mysqli_close($conn);

  # Display order number.
  echo "<div class=\"container\">
			<div class=\"alert alert-secondary\" role=\"alert\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
					<span aria-hidden=\"true\">&times;</span>
				</button>Thanks for your order. Your Order Number Is #".$order_id."</p>
			</div>
		</div>";

  # Remove cart items.  
  $_SESSION['cart'] = NULL ;
}
# Or display a message.
else { echo '<div class=\"container\">
			<div class=\"alert alert-secondary\" role=\"alert\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
					<span aria-hidden=\"true\">&times;</span>
				</button>
				<p>There are no items in your cart.</p>
				</div>
			</div>' ; }

?>



 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</body>
	</html>
