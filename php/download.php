<?php

include('conexao.php');

$id = $_GET['id'];

$query = "SELECT * FROM arquivos WHERE id = $id";

$result = $conn->query($query);
if ($result->num_rows > 0) {
  $i = 0;
  while($row = $result->fetch_assoc()) {
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

$conn->close();

?>
