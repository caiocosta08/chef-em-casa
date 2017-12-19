<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
<!-- ESTA PÁGINA ESTÁ FUNCIONANDO COMO UM FORMULÁRIO PARA ADICIONAR AULAS AO SITE-->
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
			<li><a href="aulas.php"><span class="glyphicon glyphicon-pencil"></span> Chefs</a></li>
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
		<div class="col-sm-2 sidenav well">
			<?php
                //$logado = $_SESSION['login'];
				if($logado != '' && $logado != null){
					echo '<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>';
					echo '<h3>Olá, <b>' . $logado . '</b>!</h3>';
					echo '<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>';
				}else include('forms/login.php');
			?>
		</div>
    <div class="col-sm-8 text-left">
      <h1>Bem-vindo!</h1>
      <p>
				Olá! Nós somos o <code>CHEF EM CASA</code> e damos a você as boas vindas ao
				nosso website oficial! Após muitas orações e dedicação de muitos, nós
				alcançamos a graça de publicar o nosso portal para os nossos membros
				terem acesso a todo conteúdo formativo disponibilizado por nós. Para ter
				acesso você precisa possuir um <kbd>login</kbd> e uma <kbd>senha</kbd>.
			</p>
			<p>
				Dessa forma nós podemos ter um maior controle daqueles que participam
				das nossas aulas e formações religiosamente. Além disso, podemos proporcionar
				uma maior experiência com as Sagradas Escrituras, o Sagrado Magistério e
				a Sagrada Tradição da Santa Igreja Católica.
 			</p>
      <hr>
			<h2>Instruções</h2>
				<h4>Login</h4>
					<blockquote>
						<p><small>
							Digite o <kbd>login</kbd> e a <kbd>senha</kbd> na barra de navegação que
							está no topo da página. Após isso, aperte na tecla <code>ENTER</code> no
							seu teclado ou no botão <span class="glyphicon glyphicon-log-in"></span>
							que está ao lado das caixas de digitação.
						</small></p>
					</blockquote>
				<h4>Cadastro</h4>
					<blockquote>
						<p><small>
							Clique em <kbd>Cadastrar</kbd> na barra de navegação que está no topo
							da página. Após isso, você será redirecionado para a página de cadastro
							e deverá preencher corretament os campos com suas informações para
							finalizar o	cadastro e possuir acesso ao site.
						</small></p>
					</blockquote>
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
