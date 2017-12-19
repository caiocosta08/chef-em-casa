<?php

$servername = "ec2-23-21-236-249.compute-1.amazonaws.com";
 $username = "ppyvghrixhzopj";
 $password = "54d844fde52d69f80f688e44dd089c1407be01dcdd00c7381e84f09f60ca5094";
 $dbname = "d7reg9fb1vjb28";
 $porta = 5432;

 // Create connection
 $conn = pg_connect("host=$servername port=$porta dbname=$dbname " + "user=$username password=$password");
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }else{
   //echo 'CONNECTION OK! ';
   //echo $conn;
 }

?>
