<?php

include('conexao.php');

 $id = $_GET["id"];

 $sql = "SELECT * FROM news WHERE id = $id";
 $result = pg_query($pg_conn, $sql);
 $in_json = [];
 if (!pg_num_rows($result)) {
   $i = 0;

   while($row = pg_fetch_row($result) {
     $data = $row["data"];
     $titulo = $row["titulo"];
     $local = $row["local"];
     $topicos = $row["topicos"];
     $linksUteis = $row["linksUteis"];
     $referencias = $row["referencias"];
     $download = $row["download"];
     $resumo = $row["resumo"];
     $i++;
   }
 } else {
     echo "0 results";
 }
 pg_close($pg_conn);
 //coloca a quebra de linha na variável resumo
 $resumo = str_replace(';', '<br>', $resumo);

  echo '<h1> Aula ' . $id . ' - ' . $titulo . '</h1><br>';
  echo '<h5> Local: ' . $local . ' - Data: ' . $data . '</h5><br>';

  //teste para colocar imagem
  echo '<img src="img/crucifixo-1.jpg" alt="">';
  $topicos = explode(',', $topicos);
  if(count($topicos)>0){
    echo '<h3> Tópicos principais: </h3><br>';
    for($i=0; $i<count($topicos); $i++){
      echo '<h4> - ' . $topicos[$i] . '</h4>';
    }
    echo '<br>';
  }else{
      echo '<h4> Sem tópicos principais </h4>';
  }
  echo '<h3> Resumo da aula: </h3>';
  echo '<h4>'.$resumo.'</h4>';

  $linksUteis = explode(',', $linksUteis); //extrai os links que estão separados por vírgula
  if(count($linksUteis)>0){
    echo '<h3> Links úteis: </h3><br>';
    for($i=0; $i<count($linksUteis); $i++)
      echo '<h4> - <a href="' . $linksUteis[$i] . '">'. $linksUteis[$i] . '</a></h4>';
    echo '<br>';
  }else{
    echo '<h4> Sem links úteis </h4><br>';
  }

  $download = explode(',', $download); //divide o array dos downloads por arquivo, pois estão separados por virgula
  for($i=0; $i<count($download); $i++){
    $downloadName[$i] = explode('/', $download[$i]);//extrai o nome de cada arquivo e coloca num array
  }
  if(count($download)>0){
    echo '<h3> Arquivos para download </h3><br>';
    for($i=0; $i<count($download); $i++){
      echo '<h4> - <a href="'. $download[$i] .'" download>'.$downloadName[$i][2]. '</a>' . '</h4>';
    }
    echo '<br>';
  }else {
    echo '<h4>Sem arquivos para download.</h4><br>';
  }


  if($referencias!='')
    echo '<h3> Referências: ' .'<h4>' . $referencias . '</h4></h3><br>';
  else {
    echo '<h4> Sem referências </h4>';
  }
?>
