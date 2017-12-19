<?php

include('conexao.php');

$id = $_GET['id'];

$query = "SELECT * FROM arquivos WHERE id = $id";

$result = pg_query($pg_conn, $query);
if (!pg_num_rows($result)) {
  $i = 0;
  while($row = pg_fetch_row($result)) {
    $tipo = $row["tipo"];
    $nome = $row["nome"];
    $tamanho = $row["tamanho"];
    $conteudo = $row["conteudo"];
    $i++;
  }
} else {
    echo "0 results";
}

header("Content-length: $tamanho");
header("Content-type: $tipo");
header("Content-Disposition: attachment; filename=$nome");
echo $content;

pg_close($pg_conn);

?>
