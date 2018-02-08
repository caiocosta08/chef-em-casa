<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
<!-- ESTA PÁGINA ESTÁ FUNCIONANDO COMO UM FORMULÁRIO PARA ADICIONAR AULAS AO SITE-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chef em Casa - AULA <?php echo $id; ?></title>
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
			<li class="active"><a href="aulas.php"><span class="glyphicon glyphicon-pencil"></span> Chefs</a></li>
			<li><a href="calendario.php"><span class="glyphicon glyphicon-calendar"></span> Calendário</a></li>
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
			<div id="aulaAtual"></div>
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
							<?php include('forms/edit-aula-form.php'); ?>
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
							<!--<?php/* include('forms/contact-chef.php');*/ ?>-->
							<div id="contact-chef">
							    <form class="contact-chef" action="" method="post">
							        <div class="form-group">
							            <label>Nome do Cliente</label>
							            <input class="form-control" type="text" name="nome">
							        </div>
							        <div class="form-group">
							            <label>Data do Evento</label>
							            <input class="form-control" type="date" name="data">
							        </div>
							        <div class="form-group">
							            <label>Tipo do Evento</label>
							            <input class="form-control" type="text" name="evento">
							        </div>
							        <div class="form-group">
							            <label>Descrição</label>
							            <input class="form-control" type="text" name="desc">
							        </div>
									<div class="input-group-btn">
										<button type="submit" class="btn btn-success">Contratar <span class="glyphicon glyphicon-success"></span></button>
									</div>
							    </form>
							</div>
				  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			      </div>
			    </div>
			  </div>
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
