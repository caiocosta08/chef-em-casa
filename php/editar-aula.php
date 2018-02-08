<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$linksuteis = $_POST['linksuteis'];
$topicos = $_POST['topicos'];
$resumo = $_POST['resumo'];
$referencias = $_POST['referencias'];
$id = $_POST['id'];
include('conexao.php');

$link = "aula.php?id=".$id;
//---------------------------------
$con = pg_connect(pg_connection_string_from_database_url());
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
//str_replace(procurar, substituto, origem, $ocorrencias)
$resumo = str_replace(';', '<br>', $resumo);

$sql = "UPDATE news SET referencias='$referencias', linksuteis='$linksuteis', resumo='$resumo', titulo='$titulo', data='$data', link='$link', local='$local', topicos='$topicos' WHERE id='$id'";
$result = pg_query($con, $sql);

if($result){
  /*Atualiza o json dados.json através do arquivo salvar-dados.php*/
  //header('Location: edit-dados.php?id='. $id . "'");
  header('Location: salvar-dados.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
  //header('Location: error.php');
}

pg_close($con);
?>
