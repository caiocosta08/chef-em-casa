<?php

include_once('conexao.php');

 $sql = "SELECT * FROM news ORDER BY id DESC";

 $result = $conn->query($sql);
 $in_json = [];
 if ($result->num_rows > 0) {
   $i = 0;
   while($row = $result->fetch_assoc()) {
     $in_json[$i] = $row;
     $i++;
     }
 } else {
     echo " - 0 resultados de aulas no BD - ";
 }
 $conn->close();

  $fp = fopen("../json/dados.json", "w");
  if($fp){

  } //echo ' - sucesso ao abrir o arquivo dados.json para escrita ';
  else echo 'falha ao abrir';

  $escreve = fwrite($fp, json_encode($in_json));

  if($escreve){
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/chef/admin.php'>";
    echo "<br>";
    echo json_encode($in_json);
  }
  else echo 'falha';

  fclose($fp);

 ?>
