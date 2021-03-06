<?php include_once 'php/sessao.php'?>
<!DOCTYPE html>
	<head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114078381-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-114078381-1');
        </script>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chef em Casa - CHEFS</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
					<li class="nav-item">
						<a class="nav-link" href="sobre.php">Sobre</a>
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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
						if ($logado == '' || $logado == null) {
							echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>';
						}
					?>
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
					<h1>Chefs <span class="glyphicon glyphicon-pencil"></span></h1>
					<hr>
					<p>
						Nesta página você pode encontrar a lista completa de <code>todos</code>
						os Chefs registradas! Ao digitar algum texto no campo <code>Pesquisar</code>
						abaixo você pode encontrar a aula desejada a partir de <code>qualquer</code>
						informação sobre o Chef.
					</p>
					<p>
						Além de fazer a pesquisa, filtrando os Chefs, você pode navegar por toda
						a lista de Chefs disponíveis.
					</p>
					<hr>
					<div>
						<input class="form-control" id="myInput" type="text" placeholder="Pesquisar...">
                        <br>
						<ul style="list-style:none;" class="list-group" id="chefsRegistrados"></ul>
                        <br>
                        <button id="pag">MOSTRAR MAIS CHEFS</button>
					</div>
					<hr>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="dist/js/bundle.js" type="text/javascript"></script>
	</body>
</html>
