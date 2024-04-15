<?php

require('shop_database.php');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>
   
 </head>
 
 <style>
  body{
   background-color: linen;
   }
   
   .message{
   position: sticky;
   top: 0; left:0; right: 0;
   padding: 15px 10px;
   text-align: center;
   z-index: 1000;
   box-shadow: 0.4em 0.4em 0.2em #5c5b5b;
   font-size: 20px;
   cursor: pointer;
   }
   
   
   .btn,
   .delete-btn,
   .option-btn{
   display: inline-block;
   padding: 10px 30px;
   cursor: pointer;
   font-size: 17px;
   color: white;
   border-radius:5px;
   text-transform: capitalize;
   }
   
   .btn{
   background-color: blue;
   margin-top: 10px;
   }
   
   .delete-btn{
   background-color: red;
   }
   .option-btn{
    background-color: orange;
	}
	
	.btn:hover,
   .delete-btn:hover,
   .option-btn:hover {
   background-color: grey;
   }
   
   .form-container{
	min-height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 20px;
	}
	
	.form-container form{
	width: 400px;
	border-radius: 5px;
	border: black;
	padding: 20px;
	text-align: center;
	background-color: white;
	}
	
	.form-container form h3{
	font-size: 20px;
	margin-bottom:10px;
	color: black;
	}
	
	.form-container form p{
	margin-top: 20px;
	font-size: 18px;
	colot: black;
	}
	
	.form-container form p a{
	  color: red;
	  }
	.form-container form a:hover{
	 text-decoration: underline;
	 }
	
	.container{
	padding: 0 20px;
	margin: 0 auto;
	max-width: 1200px;
	padding-botton: 70px;
	}
	
	.container .heading{
	text-align: center;
	margin-bottom: 70px; font-size: 40px;
	text-transform: uppercase;
	color: black;
	}
	
	
	.container .user-info{
	padding: 20px;
	text-align: center;
	border: black;
	box-shadow: 0.4em 0.4em 0.2em #5c5b5b;
	background-color: white;
	border-radius: 5px;
	margin: 20px auto;
	max-width: 500px;
	}
	
	.container .user-info p{
	margin-bottom: 10px;
	font-size: 25px;
	color: black;
	}
	
	.container user-info p span{
	color: red;
	}
	
	.container .user-info .flex{
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
	gap: 10px;
	align-items: flex-end;
	}
	
	.form-container form .box{
	width: 80%;
	border-radius: 5px;
	border-box: black;
	padding: 12px 14px;
	font-size: 18px;
	margin: 10px 0;
	}
	
	.container .products .box-container{
	display: flex;
	flex-wrap: wrap;
	gap: 15px;
	justify-content: center;
	}
	
	.container .products .box-container .box{
	text-align: center;
	border-radius: 5px;
	box-shadow: 0.4em 0.4em 0.2em #5c5b5b;
	position: relative;
	padding: 20px;
	background-color: white;
	width: 220px;
	}
	
	.container .products .box-container .box img{
	height:200px;
	}
	
	.container .products .box-container .name{
	font-size: 20px;
	color: black;
	padding: 5px 0;
	}
	
	.container .products .box-container .price{
	position: absolute;
	top: 10px; left: 10px;
	font-size: 20px;
	color: white;
	padding: 5px 10px;
	background-color: orange;
	border-radius: 5px;
	}
	
	.container .products .box-container .box input[type="number"]{
	margin: 10px 0;
	width: 80%;
	border: black;
	border-radius: 5px;
	font-size: 20px;
	color: black;
	padding: 12px 14px;
	}
	.container .shopping-cart{
	 padding: 20px 0;
	 }
	.container .shopping-cart table{
	width: 100%;
	text-align: center;
	border: black;
	border-radius: 5px;
	box-shadow: 0.4em 0.4em 0.2em #5c5b5b;
	background-color: white;
	}
	.container .shopping-cart table thead{
	background-color: grey;
	}
	.container .shopping-cart table thead th{
	padding: 10px;
	color: white;
	text-transform: capitalize;
	font-size: 20px;
	}
	.container .shopping-cart table .table-bottom{
    background-color: powderblue;
    }
    .container .shopping-cart table tr td{
    padding: 10px;
    font-size: 20px;
    color: black;
    }
     .container .shopping-cart table tr td:nth-child(1){
    padding: 0;
    }	
	 .container .shopping-cart table tr td input[type="number"]{
	width: 80px;
	border: black;
	padding: 12px 14px;
	font-size: 20px;
	color: black;
	}
	.container .shopping-cart .cart-btn{
	margin-top: 10px;
	text-align: center;
	}
	.container .shopping-cart .disabled{
	pointer-events: none;
	background-color: red;
	opacity: .5;
	user-select: none;
	}
	
	@media(max-width: 900px){
	.container .shopping-cart{
	overflow-x: scroll;
	}
	.container .shopping-cart table{
	width: 900px;
	}
	}
	
	 @media(max-width: 450px){
	.container .heading{
	  font-size: 30px;
	  }
	.container .products .box-container .box img{
	  height: 200px;
	  }
	  }
	
 
 </style>
   <body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">

<div class="user-info">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
   <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">register</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>

</div>

<div class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>
      <form method="post" class="box" action="">
         <img src="Img/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['name']; ?></div>
         <div class="price">£<?php echo $fetch_product['price']; ?></div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
   <?php
      };
   };
   ?>

   </div>

</div>

<div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
		 $grand_total = 0;
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="Img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>£<?php echo $fetch_cart['price']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>£<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
           }; 
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>£<?php echo $grand_total; ?></td>
         <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn" <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</div>

</div>

</body>
</html>