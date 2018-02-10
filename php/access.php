<?php

if(!isset($_SESSION)){
    session_start();
}
if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}

// Se nenhum valor foi recebido, o usuário não realizou o captcha
if (!$captcha_data) {
    /*echo "Por favor, confirme o captcha.";
    exit;*/
}

$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfmhEUUAAAAAK9QTn89wV-svlorn2yM2sez4YVj&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
if ($resposta.success) {
    echo "Obrigado por deixar sua mensagem!";
} else {
    echo "Usuário mal intencionado detectado. A mensagem não foi enviada.";
    exit;
}

//include('conexao.php');
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());


$login = $_POST['login'];
$senha = $_POST['senha'];
$in_json = [];

$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$senha'";
$result = pg_query($pg_conn, $sql);

if(pg_num_rows($result))
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$i = 0;
    while($row = pg_fetch_row($result)) {
        $in_json[$i] = $row;
        $i++;
    }
//$_SESSION['firstName'] = $in_json[0]['firstName'];

header('location: ../index.php');
}
else{
    unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location: ../index.php');

}
pg_close($pg_conn);
?>
