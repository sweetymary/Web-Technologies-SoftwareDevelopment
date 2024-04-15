<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Example</title>
</head>
<body>
	<h2>PHP Form Example</h2>
	<form method="POST">
		<label for="name"> Name: </label>
		<input type="text" name="name" id="name" required>
		<br><br>
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" required>
		<br><br>
		<input type="submit" value="Submit" required>
	</form>
	<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	// do something with the form data, such as storing it in a database or sending an email
	
	echo "Thank you for submitting the form!";
} else {
	// the form wasn't submitted properly
	echo "There was an error submitting the form.";
}
?>

<?php
         // define variables and set to empty values
         $name_error = $email_error ;
         $name = $email;
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $name_error = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $email_error = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if email address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $email_error = "Invalid email format"; 
               }
            }
        }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>  
    

    
    
</body>
</html>