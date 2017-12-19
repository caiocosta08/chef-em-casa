<?php

include_once('conexao.php');
$id = $_GET['id'];

 $sql = "SELECT * FROM news ORDER BY id DESC";
 $result = pg_query($pg_conn, $sql);
 $in_json = [];
 if (pg_num_rows($result)) {
   $i = 0;
   while($row = pg_fetch_row($result)) {
     $in_json[$i] = $row;
     $i++;
     }
 } else {
     echo " - 0 resultados de aulas no BD - ";
 }
 pg_close($pg_conn);

  $fp = fopen("../json/dados.json", "w");
  if($fp){

  } //echo ' SQL---> '. $sql . ' - sucesso ao abrir o arquivo dados.json para escrita ';
  else echo 'falha ao abrir';

  $escreve = fwrite($fp, json_encode($in_json));

  if($escreve){
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/chef/aula.php?id=". $id .">";
  }
  else echo 'falha';

  fclose($fp);

 ?>
