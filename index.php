<?php include_once('php/sessao.php') ?>
<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chef em Casa - INÍCIO</title>
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
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
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
		
		<?php include('modal/modal-add-user.php'); ?>
	
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-sm-2 sidenav">
					<ul id="contentNews" style="list-style: none; padding: 0;"></ul>
				</div>
				<div class="col-sm-8 text-left">
					<?php
						if($logado != '' && $logado != null){
							echo '<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>';
							echo '<h3>Olá, <b>' . $logado . '</b>!</h3>';
							echo '<button type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>';
						}else include('forms/login.php');
					?>
				</div>
				<div class="col-sm-2 sidenav">
					<ul id="contentNews" style="list-style: none; padding: 0;"></ul>
				</div>
			</div>
		</div>

		<footer class="container-fluid text-center">
			<p>Copyright &copy; 2017 Chef em Casa. All Rights Reserved.</p>
			<p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
		</footer>
	</body>
</html>
