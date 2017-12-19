<?php
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$local = $_POST['local'];
$linksUteis = $_POST['linksUteis'];
$topicos = $_POST['topicos'];
$resumo = $_POST['resumo'];
$referencias = $_POST['referencias'];

include('conexao.php');
$consulta = "SELECT id FROM news ORDER BY id";
$resultado = pg_query($pg_conn, $consulta);
if (!pg_num_rows($resultado)) {
  while($row = pg_fetch_row($resultado)) {
    $id = $row["id"];
  }
}
$id++;
$link = "aula.php?id=".$id;
//---------------------------------
$con = pg_connect("host=$servername port=$porta dbname=$dbname " + "user=$username password=$password");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
  //echo '<h1> SUCESSO AO ABRIR CONEXAO </h1>';
}
//str_replace(procurar, substituto, origem, $ocorrencias)
$resumo = str_replace(';', '<br>', $resumo);

$sql = "INSERT INTO news (referencias, linksUteis, resumo, titulo, data, link, local, topicos) VALUES ('$referencias', '$linksUteis', '$resumo','$titulo','$data', '$link','$local', '$topicos')";

$result = pg_query($con,$sql);

if(!pg_num_rows($result)){
  /*Atualiza a página redirecionando para a mesma
  //após submeter o formulário.*/
  header('Location: salvar-dados.php');
}else{
  echo '<h1> erro ao inserir ' . $sql . '</h1>';
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
pg_close($con);
?>
