
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli("localhost", "root", "", "DBschema");
 
// Check connection
if($link->connect_errno) {
  die('There was an error while trying to connect to database!');
  }
// Attempt insert query execution
$sql = "INSERT INTO web (name) VALUES ('$name')";
    echo $sql;        
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>