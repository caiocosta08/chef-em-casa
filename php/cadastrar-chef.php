<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$linksuteis = $_POST['linksuteis'];
$topicos = $_POST['topicos'];
$resumo = $_POST['resumo'];
$referencias = $_POST['referencias'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = pg_query($pg_conn, $consulta);
echo 'resultados: ' . pg_get_result($resultado);
echo 'erros: ' . pg_last_error($resultado);
echo 'numero de linhas: ' . pg_num_rows($resultado);
$id = pg_num_rows($resultado);
$id++;
$link = "chef.php?id=".$id;
//---------------------------------
$con = pg_connect(pg_connection_string_from_database_url());
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
//str_replace(procurar, substituto, origem, $ocorrencias)
$resumo = str_replace(';', '<br>', $resumo);

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

$query = "INSERT INTO arquivos (nome, tipo, tamanho, conteudo ) "."VALUES ('$fileName', '$fileType', '$fileSize', '$content')";
$res = pg_query($con, $query);
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

}
pg_close($pg_conn);
?>