<!DOCTYPE html>
<html>
    <head>
        <title> Challenge 1 </title>
    </head>
<body>
<p>1. Creating a PHP script that utilises variables, strings, and math</p>
<?php
$width = 10;
$height = 5;
$area = $width * $height;
echo "The rectangle has a width of $width meters, a height of $height meters, and an area of $area square meters.";

?>
<br>

<p>2. Create a PHP program that takes two numbers and outputs the result of adding, subtracting, multiplying, and dividing them. The program should also concatenate the two numbers into a string.
(Strings, Numbers and Maths)</p>
 <?php
 //Strings, Numbers and Maths
$num1 = 10;
$num2 = 5;
?>
<br>

<?php
// Addition
$sum = $num1 + $num2;
echo "Addition of $num1 and $num2 is: $sum ";
?>
<br>

<?php
// Subtraction
$diff = $num1 - $num2;
echo "Subtraction of $num1 and $num2 is: $diff ";
?>
<br>

<?php
// Multiplication
$prod = $num1 * $num2;
echo "Multiplication of $num1 and $num2 is: $prod ";
?>
<br>

<?php
// Division
$div = $num1 / $num2;
echo "Division of $num1 and $num2 is: $div ";
?>
<br>

<?php
// Concatenation
$str = "$num1" . "$num2";
echo "Concatenation of $num1 and $num2 is: $str ";
?>
<br>
<p>3. Create a program that your age  and then displays the number of days, hours, and minutes you have been alive. The program should use variables to store the user's age and the number of days, hours, and minutes you have been alive.
(Age Calculator)</p>

<?php
//Age Calculator

$age = 46;
$days = $age * 365;
$hours = $days * 24;
$min = $hours * 60;

echo "<h1>Welocme to the Age Calculator</h1>
  <h2>Your age: $age </h2>
  <h2> You have been alive for:</h2>
<ul> 
  <li>$days days</li>
  <li>$hours hours</li>
  <li>$min minutes</li>
<ul>";
?>
<br>

<p>4. Create and initialise an array variable using a suitable variable name to display the following values:
Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday</p> 

<?php
//Numeric Array
# Create and initialise an array variable.
echo"<h1>Days of the Week</h1>";
$days = array( 'Monday' , 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday' ) ;

# Display the value in all elements as a bulleted list.
foreach( $days as $value ) 
{ echo "<ul><li>$value </li></ul> " ; } 
?>
<br>

<p>5. Create and initialise an array variable using a suitable variable name to display the following values for climate in Edinburgh.</p>

<?php
 $summer= "July-Aug";
 $winter= "Jan-Feb";
 $temperature = array("summer_low" =>11, "summer_high" =>19, "winter_low" =>1, "winter_high" =>7);
	   
echo "<table  class=\"table table-condensed\">
 <tr>
  <h1>Average Temperature in Edinburgh</h1>
 </tr>
  
 <tr>
  <th>Month</th> 
  <th>High</th>
  <th>Low</th>
 </tr>
 
 <tr>
  <th>$summer</th>
  <th>"  . $temperature['summer_high'] . "  ℃</th>
  <th>"  . $temperature['summer_low'] . "  ℃</th>
 </tr>
 
 <tr>
  <th>$winter</th>
  <th>"  . $temperature['winter_high'] . "  ℃</th>
  <th>"  . $temperature['winter_low'] . "  ℃</th>
 </tr>
</table>";
?>
<br>

<p>6. Create and initialise an array variable using a suitable variable name to display the student’s results.
(Multi-Dimensional Arrays)</p>	

<?php 
 echo"<h1>Student Results</h1>";
   $results = array( 
      "aarron" => array (
        "Physics" => '74%',
        "English" => '79%',	
        "Maths" => '70%'
            ),
            
            "jamie" => array (
               "Physics" => '64%',
               "English" => '79%',	
               "Maths" => '69%'
            ),
            
            "harry" => array (
               "Physics" =>'55%',
               "English "=> '52%',	
               "Maths" => '57%'
            )
         );
         
         /* Accessing multi-dimensional array values */
         echo "Result for Physics for Aarron : " ;
         echo $results['aarron']['Physics'] . "<br>"; 
         
         echo "Results for English for Jamie: ";
         echo $results['jamie']['English'] . "<br>"; 
         
         echo "Results for Maths for Harry : " ;
         echo $results['harry']['Maths'] . "<br>"; 
?>
  
  
 
    
	
	</body>
	</html>
	