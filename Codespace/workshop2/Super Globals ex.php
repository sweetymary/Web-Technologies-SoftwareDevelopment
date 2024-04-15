<!DOCTYPE html>
<html>
    <head>
        <title> PHP Super Globals examples </title>
    </head>
	<body>
	<p>1. $_SERVER to retrieve information about the current request, including the request method, script name, current URL, and user agent string. </p><br>
	
	<?php
// Get the request method (e.g. GET, POST, etc.)
$request_method = $_SERVER['REQUEST_METHOD'];
echo "Request Method: $request_method <br>"; 

// Get the script name (e.g. /index.php)
$script_name = $_SERVER['SCRIPT_NAME'];
echo "Script Name: $script_name <br>";

// Get the current URL (e.g. http://localhost/index.php?id=123)
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo "Current URL: $current_url <br>";

// Get the user agent string of the client's browser
$user_agent = $_SERVER['HTTP_USER_AGENT'];
echo "User Agent: $user_agent <br>";
?>

<p>2. $_REQUEST superglobal to get data from a form submitted via either $_POST or $_GET.</p><br>

 <!-- A simple HTML form that submits data to the same page using either POST or GET -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Submit">
</form>

<?php
// Get the values submitted via the form, using $_REQUEST
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];

// Display the submitted values
echo "Name: $name <br>";
echo "Email: $email <br>";
?>

    


	
	
	
	</body>
	</html>