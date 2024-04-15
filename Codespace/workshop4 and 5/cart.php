
<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">  
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1,  
        shrink-to-fit=no"> 
        <title> Cart </title>
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
<?php # DISPLAY SHOPPING CART PAGE.

# Set page title and display header section.
include ('session-cart.php');

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;        
	
	        

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.
  require ('codespace.php');
  
  # Retrieve all items in the cart from the 'products' database table.
  $q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($conn, $q);

  # Display body section with a form and a table.
  echo '<form action="cart.php" method="post">
			<table class="table">
				<thead>
				<tr><th>Items in your cart</th></tr>
				</thead>
				<tbody>
				<tr>';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<tr><td>{$row['item_name']}</td> 
    <td><input type=\"text\" size=\"3\" name=\"qty[{$row['item_id']}]\" value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\"></td>
    <td>@ {$row['item_price']} = </td> 
	
	<td> £ ".number_format ($subtotal, 2)."</td></tr>";
  }
  
  # Close the database connection.
  mysqli_close($conn); 
  
  # Display the total.
  echo ' <tr><td></td><td></td><td></td>
  <td>Total = £ '.number_format($total,2).'</td>
  </tr>
  <tr><td></td><td></td><td></td>
  <td><input type="submit" name="submit" class="btn btn-light btn-block" value="Update My Cart"></td>
  </tr>
  <tr><td></td><td></td><td></td>
  <td><a href="checkout.php?total='.$total.'" class="btn btn-light btn-block">Checkout Now</a></td>
  </table>
  </form>';
}
else
# Or display a message.
{ echo '<div class="alert alert-secondary" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p>Your cart is currently empty.</p>
				</div>
		</div>' ; }




?>



 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</body>
	</html>
</body>
</html>