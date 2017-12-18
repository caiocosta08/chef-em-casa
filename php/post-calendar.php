<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$hora = $_POST['hora'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = $conn->query($consulta);
if ($resultado->num_rows > 0) {
  while($row = $resultado->fetch_assoc()) {
    $id = $row["id"];
  }
}
$id++;
//---------------------------------
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO calendar (titulo, data, local, hora) VALUES ('$titulo', '$data', '$local', '$hora')";
$result = $con->query($sql);

if($result){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  //header('Location: test-json/salvar-dados.php');
  header('Location: ../admin.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
$con->close();
?>
