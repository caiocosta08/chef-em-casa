<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$hora = $_POST['hora'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = pg_query($pg_conn, $consulta);
if (!pg_num_rows($resultado)) {
  while($row = pg_fetch_row($resultado) {
    $id = $row["id"];
  }
}
$id++;
//---------------------------------
if ($pg_conn->connect_error) {
    die("Connection failed: " . $pg_conn->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO calendar (titulo, data, local, hora) VALUES ('$titulo', '$data', '$local', '$hora')";
$result = pg_query($pg_conn, $sql);

if(!pg_num_rows($result)){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  //header('Location: test-json/salvar-dados.php');
  header('Location: ../admin.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
pg_close($pg_conn);
/*$con = pg_connect(pg_connection_string_from_database_url());
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO calendar (titulo, data, local, hora) VALUES ('$titulo', '$data', '$local', '$hora')";
$result = pg_query($con, $sql);

if(!pg_num_rows($result)){
  Atualiza a página redirecionando para a mesma
  //após submeter o formulário.
  //header('Location: test-json/salvar-dados.php');
  header('Location: ../admin.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
pg_close($con);
*/
?>
