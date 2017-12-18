<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$linksUteis = $_POST['linksUteis'];
$topicos = $_POST['topicos'];
$resumo = $_POST['resumo'];
$referencias = $_POST['referencias'];
$id = $_POST['id'];
include('conexao.php');

$link = "aula.php?id=".$id;
//---------------------------------
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
//str_replace(procurar, substituto, origem, $ocorrencias)
$resumo = str_replace(';', '<br>', $resumo);

$sql = "UPDATE news SET referencias='$referencias', linksUteis='$linksUteis', resumo='$resumo', titulo='$titulo', data='$data', link='$link', local='$local', topicos='$topicos' WHERE id='$id'";
$result = $con->query($sql);

if($result){
  /*Atualiza o json dados.json através do arquivo salvar-dados.php*/
  header('Location: edit-dados.php?id='. $id . "'");
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
  header('Location: error.php');
}

$con->close();
?>
