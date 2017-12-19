<?php

$servername = "ec2-23-21-236-249.compute-1.amazonaws.com";
 $username = "ppyvghrixhzopj";
 $password = "54d844fde52d69f80f688e44dd089c1407be01dcdd00c7381e84f09f60ca5094";
 $dbname = "d7reg9fb1vjb28";
 $porta = 5432;
 $dburl = "postgres://uqahcioaoktplr:321ad2c23bf722fbeffc77c919e7a5d31dc37bef735bd4486f6f653b6ebc1f31@ec2-23-21-236-249.compute-1.amazonaws.com:5432/d7reg9fb1vjb28";
 $dbopts = parse_url(getenv('DATABASE_URL'));
 $app->register(new Herrera\Pdo\PdoServiceProvider(),
                array(
                    'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
                    'pdo.username' => $dbopts["user"],
                    'pdo.password' => $dbopts["pass"]
                )
 );

/*
 // Create connection
 $conn = pg_connect("host=$servername port=$porta dbname=$dbname " + "user=$username password=$password");
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }else{
   //echo 'CONNECTION OK! ';
   //echo $conn;
}*/

?>
