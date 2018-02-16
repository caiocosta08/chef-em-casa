<?php include_once('php/sessao.php') ?>
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
		<title>Chef em Casa - INÍCIO</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        
    </head>
	
	<body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMZNNMW"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
	
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
				<div class="col-md-2 sidenav">
					<ul id="contentNews" style="list-style: none; padding: 0;"></ul>
				</div>
				<div class="col-md-8 text-left">
					<?php
						if($logado != '' && $logado != null){
							echo '<span style="font-size: 50px;" class="glyphicon glyphicon-user"></span>';
							echo '<h3>Olá, <b>' . $logado . '</b>!</h3>';
							echo '<button id="btnLogout" type="button" name="button"><a href="php/logout.php">LOGOUT</a> </button>';
						}else include('forms/login.php');
					?>
                    <a href="#" id="ga">CLIQUE</a>
                    <a href="#" id="g1">CLIQUE111</a>
                    <a href="#" id="g2">CLIQUE222</a>
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
        <script src="js/load.js" type="text/javascript"></script>
		<script src="js/functions.js" type="text/javascript"></script>
		<script src="js/validator.js" type="text/javascript"></script>
        <script src="js/img.js" type="text/javascript"></script>
		<script src="js/ana.js" type="text/javascript"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>
