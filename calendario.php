<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chef em Casa - CALENDÁRIO</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/load.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
<script src="js/validator.js" type="text/javascript"></script>
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
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="chefs.php"><span class="glyphicon glyphicon-pencil"></span> Chefs</a></li>
			<li class="active"><a href="calendario.php"><span class="glyphicon glyphicon-calendar"></span> Calendário</a></li>
			<li><a href="admin.php"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
			<li><a href="sobre.php"><span class="glyphicon glyphicon-info-sign"></span> Sobre</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if($logado == '' || $logado == null) echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>'?>
		</ul>
	</div>
	</nav>

<div class="container-fluid text-center">
  <div class="row content">
		<div class="col-sm-2 sidenav well">
			<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>
			<h3>Olá, <b><?php echo $logado ?></b>! </h3>
			<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>
		</div>
    <div class="col-sm-8 text-left">
      <h1>Calendário <span class="glyphicon glyphicon-calendar"></span></h1>
			<hr>
			<p>
				Nesta página você pode encontrar a lista completa de <code>todos</code>
				os eventos agendados! Ao digitar algum texto no campo <code>Pesquisar</code>
				abaixo você pode encontrar o evento desejado a partir de <code>qualquer</code>
				informação sobre ele.
			</p>
			<p>
				Além de fazer a pesquisa, filtrando os eventos, você pode navegar por toda
				a lista de eventos marcados.
			</p>
      <hr>
			<div>
				<input class="form-control" id="myInput" type="text" placeholder="Pesquisar...">
				<ul style="list-style:none;" class="list-group" id="calendar"></ul>
			</div>
			<hr>
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
