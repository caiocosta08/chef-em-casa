<?php

$servername = "localhost";
 $username = "root";
 $password = "631537";
 $dbname = "BD-CHEF";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }else{
   //echo 'CONNECTION OK! ';
   //echo $conn;
 }

?>
