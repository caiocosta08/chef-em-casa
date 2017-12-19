<?php

  include('conexao.php');

 $sql2 = "SELECT * FROM news ORDER BY id DESC";
 $result2 = pg_query($conn, $sql2);
 $dados_json = [];
 if ($result2) {
   $i = 0;
   while($row = pg_fetch_row($result2)) {
     $in_json[$i] = $row;
     $i++;
     }
 } else {
     echo "0 results";
 }
$fp2 = fopen("../json/dados.json", "w");

  if($fp2) echo '2 sucesso ao abrir o arquivo; ';
  else echo 'falha ao abrir 2';
  $escreve2 = fwrite($fp2, json_encode($dados_json));

  if($escreve2){
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../json/dados.json'>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../aulas.php'>";
  }
  else echo 'falha';

  fclose($fp2);
  pg_close($conn);
 ?>
