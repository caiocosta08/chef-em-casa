<?php

  include('conexao.php');

 $sql2 = "SELECT * FROM news ORDER BY id DESC";
 $result2 = $conn->query($sql2);
 $dados_json = [];
 if ($result2->num_rows > 0) {
   $i = 0;
   while($row = $result2->fetch_assoc()) {
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
  $conn->close();
 ?>
