<?php

  include_once('conexao.php');

  $sql = "SELECT * FROM calendar ORDER BY id DESC";
  echo ' SQL ---> ' . $sql . ' - ';
  $result = pg_query($conn, $sql);
  $in_json = [];
  if ($result) {
   $i = 0;
   while($row = pg_fetch_row($result)) {
     $in_json[$i] = $row;
     $i++;
     }
  } else {
     echo "A consulta obteve 0 resultados na tabela calendar. ";
  }
  pg_close($conn);

  $fp = fopen("../json/calendario.json", "w");
  if($fp) echo ' - Sucesso ao abrir o arquivo calendario.json para escrita. - ';
  else echo ' - Falha ao abrir o arquivo calendario.json para escrita. - ';

  $escreve = fwrite($fp, json_encode($in_json));

  if($escreve){}
  else echo ' - falha';

  fclose($fp);

 ?>
