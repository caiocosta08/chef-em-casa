<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chef em Casa - CHEF <?php echo $id; ?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="js/load.js" type="text/javascript"></script>
		<script src="js/functions.js" type="text/javascript"></script>
		<script src="js/validator.js" type="text/javascript"></script>
		<script src="js/img.js" type="text/javascript"></script>
	</head>
	
	<body>	
		<nav class="navbar navbar-expand-sm navbar-dark" style="background: coral; margin-bottom: 20px;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand/Título -->
			<a class="navbar-brand" href="index.php">Chef em Casa</a>
			<!-- Links -->
			<div class="collapse navbar-collapse" id="nav-content">   
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="chefs.php">Chefs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="calendario.php">Calendário</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin.php">Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sobre.php">Sobre</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($logado == '' || $logado == null) echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>'?>
				</ul>
			</div>
		</nav>
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-md-2 sidenav">
					<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>
					<div class="card" style="width: 100%;">
						<div class="card-body">
							<h5 class="card-title">Bem vindo</h5>
							<h6 class="card-subtitle mb-2 text-muted"></h6>
							<p class="card-text">
								<h3>Olá, <b><a href="#"><?php echo $logado ?></a></b>!</h3>
							</p>
							<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>		
						</div>
					</div>				
				</div>
				<div class="col-md-8 text-left">
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
				<div class="col-md-2 sidenav">
					<ul id="contentNews" style="list-style: none; padding: 0;"></ul>
				</div>
			</div>
		</div>
		<footer class="container-fluid text-center">
			<p>Copyright &copy; 2017 Chef em Casa. All Rights Reserved.</p>
			<p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
		</footer>
		<script type="text/javascript" src="js/img.js"></script>
	</body>
</html>
