<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$hora = $_POST['hora'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = pg_query($pg_conn, $consulta);
$id = pg_num_rows($resultado)
$id++;
//---------------------------------
if ($pg_conn->connect_error) {
    die("Connection failed: " . $pg_conn->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO calendar (titulo, data, local, hora) VALUES ('$titulo', '$data', '$local', '$hora')";
$result = pg_query($pg_conn, $sql);

if(pg_num_rows($result)){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  header('Location: ../admin.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
pg_close($pg_conn);

?>
