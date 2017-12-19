<?php

  include_once('conexao.php');

  $sql = "SELECT * FROM calendar ORDER BY id DESC";
  echo ' SQL ---> ' . $sql . ' - ';
  $result = pg_query($pg_conn, $sql);
  $in_json = [];
  if (pg_num_rows($result)) {
      $in_json = pg_fetch_all($result);
      $in_json = json_encode($in_json);
   // $i = 0;
   // while($row = pg_fetch_row($result)) {
   //   $in_json[$i] = $row;
   //   $i++;
   //   }
  } else {
     echo "A consulta obteve 0 resultados na tabela calendar. ";
  }
  pg_close($pg_conn);

  $fp = fopen("../json/calendario.json", "w");
  if($fp) echo ' - Sucesso ao abrir o arquivo calendario.json para escrita. - ';
  else echo ' - Falha ao abrir o arquivo calendario.json para escrita. - ';

  $escreve = fwrite($fp, $in_json);

  if($escreve){}
  else echo ' - falha';

  fclose($fp);

 ?>
