<?php

//include_once('conexao.php');

 $sql = "SELECT * FROM messages ORDER BY id DESC";

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
 $in_json2 = '';
 $i = 0;
 print "<pre>\n";
 if (!pg_num_rows($result)) {
   print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
 } else {

   $in_json2 = pg_fetch_all($result);
   $in_json2 = json_encode($in_json2);
 }
 print "\n";

  $fp = fopen("../json/messages.json", "w");
  if($fp){

  } //echo ' - sucesso ao abrir o arquivo dados.json para escrita ';
  else echo 'falha ao abrir';

  $escreve = fwrite($fp, $in_json2);

    if($escreve){
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/chat.php'>";
    }
  else echo 'falha';

  fclose($fp);

 ?>
