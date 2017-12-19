<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$hora = $_POST['hora'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = pg_query($conn, $consulta);
if ($resultado) {
  while($row = pg_fetch_row($resultado) {
    $id = $row["id"];
  }
}
$id++;
//---------------------------------
$con = pg_connect("host=$servername port=$porta dbname=$dbname " + "user=$username password=$password");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO calendar (titulo, data, local, hora) VALUES ('$titulo', '$data', '$local', '$hora')";
$result = pg_query($con, $sql);

if($result){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  //header('Location: test-json/salvar-dados.php');
  header('Location: ../admin.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
pg_close($con);
?>
