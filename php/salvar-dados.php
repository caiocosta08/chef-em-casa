<?php

//include_once('conexao.php');

 $sql = "SELECT * FROM news ORDER BY id DESC";

 # This function reads your DATABASE_URL config var and returns a connection
 # string suitable for pg_connect. Put this in your app.
 function pg_connection_string_from_database_url() {
   extract(parse_url($_ENV["DATABASE_URL"]));
   return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
 }
 # Here we establish the connection. Yes, that's all.
 $pg_conn = pg_connect(pg_connection_string_from_database_url());
 # Now let's use the connection for something silly just to prove it works:
 $result = pg_query($pg_conn, $sql);
 $in_json = [];
 $in_json2 = [];
 $i = 0;
 print "<pre>\n";
 if (!pg_num_rows($result)) {
   print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
 } else {
   print "Tables in your database:\n";
   while ($row = pg_fetch_row($result)) {
       print("- $row[0]\n");
       $in_json[$i] = $row;
       $i++;
       echo json_encode($in_json);
   }
   $in_json2 = pg_fetch_all($result);
   $in_json2 = json_encode($in_json2);
   echo "<br> <h3>TO JSON</h3> <br>";
   echo $in_json2;
   echo "<br> <h3>TO JSON</h3> <br>";

   echo "<br> <h3>TO JSON</h3> <br>";
   echo json_encode($in_json);
   echo "<br> <h3>TO JSON</h3> <br>";


 }
 print "\n";




  $fp = fopen("../json/dados.json", "w");
  if($fp){

  } //echo ' - sucesso ao abrir o arquivo dados.json para escrita ';
  else echo 'falha ao abrir';

  $escreve = fwrite($fp, json_encode($in_json));

  if($escreve){
    //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/admin.php'>";
    //echo "<br>";
    echo json_encode($in_json);
  }
  else echo 'falha';

  fclose($fp);

 ?>
