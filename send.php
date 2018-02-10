<?php
$mensagem = $_POST['message-to-send'];

include('php/conexao.php');
$user = 'caioba';
//---------------------------------
$con = pg_connect(pg_connection_string_from_database_url());
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}

$sql = "INSERT INTO messages (name, message) VALUES ('$user','$mensagem')";

$result = pg_query($pg_conn,$sql);

if($result){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  echo "alert('Mensagem enviada com sucesso')";
  header('Location: salvar-msg.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
  echo pg_result_error($result);
}

pg_close($pg_conn);
?>
