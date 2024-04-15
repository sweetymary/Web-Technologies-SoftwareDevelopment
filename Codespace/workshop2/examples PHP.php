<!DOCTYPE html>
<html>
    <head>
        <title> PHP Test.Examples of creating and manipulating strings in PHP </title>
    </head>
    <body>
	
// Define a string using double quotes <br>
<?php
$string1 = "Hello, world!";
echo "Hello, world!";
?> 
<br>

// Define a string using single quotes<br>
<?php
$string2 = 'This is a PHP string.';
echo 'This is a PHP string.';
?><br>

// Concatenate two strings<br>
<?php
$concatenated = $string1 . " " . $string2;
echo 'Hello, world!' . " " . 'This is a PHP string.';
?>
 <br>

// Get the length of a string<br>
<?php
$length = strlen($concatenated);
echo strlen('Hello, world!' . " " . 'This is a PHP string.');
?> 
<br>

// Convert a string to uppercase <br>
<?php
$uppercase = strtoupper($concatenated);
echo strtoupper('Hello, world!' . " " . 'This is a PHP string.');
?> 
<br>


 
    </body>
</html>