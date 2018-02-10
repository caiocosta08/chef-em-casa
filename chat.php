<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chef em Casa - ADMIN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/load.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
<script src="js/validator.js" type="text/javascript"></script>
<script src="js/img.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style rel="stylesheet" type="text/css">
	.navbar {
		background-color: #fff353;
		border-color: #8a6d3b;
	}
	.navbar-inverse .navbar-nav>li>a{
		color: #8a6d3b;
	}
	.navbar-inverse .navbar-nav>li>a:hover{
		color: #333333;
	}
	.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
		background-color: #8a6d3b;
	}
	.navbar-inverse .navbar-brand{
		color: #8a6d3b;
	}
	.navbar-inverse .navbar-brand:hover{
		color: #333333;
	}
	body {
		color: #8a6d3b;
	}
	blockquote small {
		color: #8a6d3b;
	}
	.content {
		/*background-color: #fff1a8;
	*/}
	.well {
		background-color: #b99c6b;
		border-color: #8a6d3b;
		color: #d5c4a1;
	}
	.well a{
		color: white;
	}
	.page-header {
		color: gray;
		background-color: yellow;
		border-color: yellow;
	}
</style>
</head>
<body style="margin: 1%;">
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Chef em Casa</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="chefs.php"><span class="glyphicon glyphicon-pencil"></span> Chefs</a></li>
			<li><a href="calendario.php"><span class="glyphicon glyphicon-calendar"></span> Calendário</a></li>
			<li><a href="admin.php"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
			<li><a href="sobre.php"><span class="glyphicon glyphicon-info-sign"></span> Sobre</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if($logado == '' || $logado == null) echo '<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>'?>
		</ul>
	</div>
	</nav>
	<?php include('modal/modal-add-user.php'); ?>
<div class="container-fluid text-center">
  <div class="row content">
  <div class="col-sm-2 sidenav">
			<ul id="contentNews" style="list-style: none; padding: 0;">
			</ul>
		</div>
		<div class="col-sm-8 text-left">
			<?php
                if($logado != '' && $logado != null){
					echo '<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>';
					echo '<h3>Olá, <b>' . $logado . '</b>!</h3>';
					echo '<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>';
				}else include('forms/login.php');
			?>

			<div class="chat">
				<div class="show-chat">
				<h1>CHAT</h1>
				</div>

				<div class="input-chat">
					<form class="send-message" method="post" action="">
						<input name="message-to-send" id="message-to-send" type="text">
						<button id="btn-send-message" type="submit"></button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<ul id="contentNews" style="list-style: none; padding: 0;">
			</ul>
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2017 Chef em Casa. All Rights Reserved.</p>
	<p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
</footer>
</html>

<?php

//include_once('conexao.php');

 $sql = "SELECT * FROM messages WHERE user=" . $user . " ORDER BY id DESC";

 # This function reads your DATABASE_URL config var and returns a connection
 # string suitable for pg_connect. Put this in your app.
 function pg_connection_string_from_database_url() {
   extract(parse_url($_ENV["DATABASE_URL"]));
   return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
 }
 # Here we establish the connection. Yes, that's all.
 $pg_conn = pg_connect(pg_connection_string_from_database_url());
 # Now let's use the connection for something silly just to prove it works:
 $result = pg_query($pg_conn, $sql);
 $in_json = [];
 $in_json2 = '';
 $i = 0;
 print "<pre>\n";
 if (!pg_num_rows($result)) {
   print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
 } else {

   $in_json2 = pg_fetch_all($result);
   $in_json2 = json_encode($in_json2);
 }
 print "\n";

  $fp = fopen("../json/messages.json", "w");
  if($fp){

  } //echo ' - sucesso ao abrir o arquivo dados.json para escrita ';
  else echo 'falha ao abrir';

  $escreve = fwrite($fp, $in_json2);

    if($escreve){
//      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/admin.php'>";
    }
  else echo 'falha';

  fclose($fp);

 ?>