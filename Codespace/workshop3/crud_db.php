 <!DOCTYPE html>
<html>
    <head>
        <title> Connecting MySQL to Database </title>
    </head>
	<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "crud_db";

# Connect  on 'localhost' for user to database.

$conn = mysqli_connect($servername, $username, $password, $db); 

if (!$conn) { 

# Otherwise fail and explain the error. 

die('Could not connect to MySQL: ' . mysqli_connect_error()); 

} 

echo 'Connected to the database successfully!';  

?>

</body>
</html> 