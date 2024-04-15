<!doctype html>
<html lang="en">
  <head>
<title> CRUD Practice!</title>
  </head>
  <body>
	  <?php
# Open database connection.
require ( 'crud_db.php' ) ;

if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;    
    $sql = "DELETE FROM users WHERE id='$id'";
 if ($conn->query($sql) === TRUE) {
       header("Location: read.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    ?>
    
  
  </body>
  </html>