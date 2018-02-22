<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$linksuteis = $_POST['linksuteis'];
$topicos = $_POST['topicos'];
$resumo = $_POST['resumo'];
$referencias = $_POST['referencias'];

include('conexao.php');

//---------------------------------
$con = pg_connect(pg_connection_string_from_database_url());
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
//str_replace(procurar, substituto, origem, $ocorrencias)
$resumo = str_replace(';', '<br>', $resumo);

$sql = "SELECT id FROM news ORDER BY id DESC LIMIT 1"; //Pega o último ID registrado para que seja incrementado
$result = pg_query($pg_conn,$sql);

$id = $result;
$link = "chef.php?id=" . &id;

$sql = '';
$result = '';

$sql = "INSERT INTO news (referencias, linksuteis, resumo, titulo, data, link, local, topicos) VALUES ('$referencias', '$linksuteis', '$resumo','$titulo','$data', '$link','$local', '$topicos')";

$result = pg_query($pg_conn,$sql);

if($result){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  header('Location: salvar-dados.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
  echo pg_result_error($result);
}

pg_close($pg_conn);
?>
