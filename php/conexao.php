<?php

$host = "ec2-23-21-236-249.compute-1.amazonaws.com";
$dbname = "d7reg9fb1vjb28";
$user = "ppyvghrixhzopj";
$password = "54d844fde52d69f80f688e44dd089c1407be01dcdd00c7381e84f09f60ca5094";
$port = "5432";

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;port=$port;password=$password";

$db = new PDO($dsn);

if($db){
  echo "Connected <br />".$db;
}else {
  echo "Not connected";
}


/*# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
# Now let's use the connection for something silly just to prove it works:
$result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";
*/

/*
$servername = "ec2-23-21-236-249.compute-1.amazonaws.com";
 $username = "ppyvghrixhzopj";
 $password = "54d844fde52d69f80f688e44dd089c1407be01dcdd00c7381e84f09f60ca5094";
 $dbname = "d7reg9fb1vjb28";
 $porta = 5432;
 $dburl = "postgres://uqahcioaoktplr:321ad2c23bf722fbeffc77c919e7a5d31dc37bef735bd4486f6f653b6ebc1f31@ec2-23-21-236-249.compute-1.amazonaws.com:5432/d7reg9fb1vjb28";

 $dbopts = parse_url(getenv($dburl));
 $app->register(new Herrera\Pdo\PdoServiceProvider(),
                array(
                    'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts[$servername] . ';port=' . $dbopts["5432"],
                    'pdo.username' => $dbopts[$username],
                    'pdo.password' => $dbopts[$password]
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
