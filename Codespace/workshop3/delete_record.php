<!DOCTYPE html>
<html>
    <head>
        <title> Connecting MySQL to Database </title>
    </head>
	<body>
	<?php
# Open database connection.
require ( 'codespace.php' ) ;

if ( isset( $_GET['deleteID'] ) )  {
	$id = $_GET['deleteID'] ;    
    $result = ("DELETE FROM products WHERE ID=''".mysql_real_escape_string($ID)."'");
	echo mysql_error();
 if ($result)
	 echo "succces"; 
       header("Location: read_table.php");
	   }
     else 
	{ echo "GET NOT SET"; }

     ?> 
    
    </body>
	</html>