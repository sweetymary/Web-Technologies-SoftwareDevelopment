<!DOCTYPE html>
<html>
    <head>
        <title> Challenge 2 </title>
    </head>
<body>
<p>1. Create a PHP function that takes in a string as an argument and returns the string with all vowels replaced with the character "x".
(PHP Function)</p>

<?php
// Define a PHP function replaceVowelsWithX that takes in a string argument $str.
function replaceVowelsWithX($str) {
  $vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'); //Define an array $vowels that contains all the vowels in both lowercase and uppercase.
  return str_replace($vowels, 'x', $str);// Use the str_replace function to replace all occurrences of the vowels in $str with the character "x".
}

// Example usage:
$input = "Hello, World!";
$output = replaceVowelsWithX($input);
echo $output; // Outputs "Hxllx, Wxrld!"
?>
<br>

<p>2. Create a simple calculator program that takes two numbers as input and performs basic arithmetic operations on them using PHP operators. The program should display the results of each operation.</p>
<h1>Calculator</h1>
	<form method="post">
		<label for="num1">Enter the first number:</label>
		<input type="number" name="num1" id="num1" required><br><br>
		
		<label for="num2">Enter the second number:</label>
		<input type="number" name="num2" id="num2" required><br><br>
		
		<label for="operator">Select an operation:</label>
		<select name="operator" id="operator">
			<option value="+">Addition (+)</option>
			<option value="-">Subtraction (-)</option>
			<option value="*">Multiplication (*)</option>
			<option value="/">Division (/)</option>
		</select><br><br>
		
		<input type="submit" value="Calculate">
	</form>

	<?php
		if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operator'])) {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$operator = $_POST['operator'];
			
			switch($operator) {
				case '+':
					$result = $num1 + $num2;
					break;
				case '-':
					$result = $num1 - $num2;
					break;
				case '*':
					$result = $num1 * $num2;
					break;
				case '/':
					$result = $num1 / $num2;
					break;
				default:
					$result = "Invalid operator";
			}
			
			echo "<p>The result of the operation is: $result</p>";
		}
	?>

<p>3. Write a PHP program that displays the multiplication table of a given number using a for loop.</p>

<form method="POST">
  Enter a number: <input type="number" name="num"><br>
  <input type="submit" value="Generate multiplication table">
</form>

<?php
// Get the input number from the user
if($_POST) { 
    $num = $_POST["num"]; 
       echo "Multiplication Table of $num: "; // Display the multiplication table of the input number
          
    for ($i = 1; $i <= 10; $i++) {          
	echo ("<p >$num" . " X " . "$i" . " = " 
            . $num * $i . "</p>"); 
    } 
} 
?>


<p>4. Create a variable $age is set the value. 
Next create a script that checks the value of $age and displays a message based on the age group it falls into.</p>

<?php
 $age = 30;

if ($age < 0) {
    echo "Invalid age";
} elseif ($age < 13) {
    echo "You are a child";
} elseif ($age <= 20) {
    echo "You are a teenager";
} elseif ($age <= 65) {
    echo "You are an adult";
} else {
    echo "You are a senior citizen";
}
?>






</body>
</html>