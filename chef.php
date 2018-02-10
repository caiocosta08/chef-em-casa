<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chef em Casa - CHEF <?php echo $id; ?></title>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
	<div class="container-fluid">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="nav-item active"><a class="nav-link" href="chefs.php"><span class="glyphicon glyphicon-pencil"></span> Chefs</a></li>
			<li class="nav-item"><a class="nav-link" href="calendario.php"><span class="glyphicon glyphicon-calendar"></span> Calendário</a></li>
			<li class="nav-item"><a class="nav-link" href="admin.php"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
			<li class="nav-item"><a class="nav-link" href="sobre.php"><span class="glyphicon glyphicon-info-sign"></span> Sobre</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if($logado == '' || $logado == null) echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>'?>
		</ul>
	</div>
	</nav>

<div class="container-fluid text-center">
  <div class="row">
		<div class="col-2 sidenav well">
			<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>
			<h3>Olá, <b><?php echo $logado ?></b>! </h3>
			<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>
		</div>
    <div class="col-8 text-left">
			<div id="chefAtual"></div>
			<hr>
			<!-- Botão que abre o modal -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Editar <span class="glyphicon glyphicon-pencil"></span></button>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Conteúdo do modal-->
			    <div class="modal-content">
			      <div class="modal-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<?php include('forms/edit-chef-form.php'); ?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Botão que abre o modal -->
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalContato">Contratar <span class="glyphicon glyphicon-success"></span></button>
			<!-- Modal -->
			<div id="modalContato" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Conteúdo do modal-->
			    <div class="modal-content">
			      <div class="modal-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2>Contrate o Chef para o seu evento!</h2>
							<?php include('forms/contact-chef.php'); ?>
				  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<hr>
			<div class="chat">
				<div class="show-chat">
				<h1>CHAT</h1>
				</div>

				<div class="input-chat">
					<form class="send-message" method="post" action="send.php">
						<input name="message-to-send" id="message-to-send" type="text">
						<input type="hidden" name="loged-user" id="loged-user" value="<?php echo $logado; ?>">
						<button id="btn-send-message" type="submit">ENVIAR</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-2 sidenav">
			<ul id="contentNews" style="list-style: none; padding: 0;">
			</ul>
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2017 Chef em Casa. All Rights Reserved.</p>
	<p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
</footer>

<script type="text/javascript" src="js/img.js"></script>
</html>
