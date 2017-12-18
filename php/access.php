<?php

if(!isset($_SESSION)){
    session_start();
}
include('conexao.php');
$login = $_POST['login'];
$senha = $_POST['senha'];
$in_json = [];

$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$senha'";
$result = $conn->query($sql);

if($result->num_rows > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$i = 0;
    while($row = $result->fetch_assoc()) {
        $in_json[$i] = $row;
        $i++;
    }
$_SESSION['firstName'] = $in_json[0]['firstName'];

header('location: ../index.php');
}
else{
  unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location: ../index.php');

}
$conn->close();
?>
