<?php
$SERVERNAME = "localhost";
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'tamk';
  
$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>