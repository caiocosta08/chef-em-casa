<?php

if(!isset($_SESSION)){
    session_start();
}

$dir = $_SERVER['PHP_SELF'];
$dir = explode('/', $dir);
$dir = $dir[2];
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  if($dir != 'index.php'){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    //header('location: index.php');
  }else{
     
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
  }
  $logado = null;
}else{
    $logado = $_SESSION['firstName'];
    //$logado = $_SESSION['login'];
}
?>
