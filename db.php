<?php
$server="localhost";
$username="root";
$password="";
$db="digital_library_management_system";


$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn){
  die("Connection Failed</br>".mysqli_connect_error());
}


?>