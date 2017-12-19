<?php
$login = $_POST['login'];
$senha = $_POST['senha'];
include('conexao.php');

//---------------------------------
$con = pg_connect("host=$servername port=$porta dbname=$dbname " + "user=$username password=$password");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
$sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";
$result = pg_query($con, $sql);

if($result){
  header('Location: ../index.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
}

//fechar conexão
pg_close($con);
?>
