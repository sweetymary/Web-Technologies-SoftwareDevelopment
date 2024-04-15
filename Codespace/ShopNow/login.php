 <?php

require('shop_database.php');
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

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
   box-shadow:var(--box-shadow);
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
    bacground-color: orange;
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
	
	
	.form-container form .box{
	width: 80%;
	border-radius: 5px;
	border-box: black;
	padding: 12px 14px;
	font-size: 18px;
	margin: 10px 0;
	}
	

</style>

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
    <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter email" class="box">
      <input type="password" name="password" required placeholder="enter password" class="box">
      <input type="submit" name="submit" class="btn" value="login now">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>