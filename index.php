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
        <link rel="icon" href="favicon.ico" />
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
	
	<body>
        
		<?php include('modal/modal-add-user.php'); ?>
        
        <div style="background-image: url('img/burger.jpg'); width: 100%; height: 700px; background-size: 300%; background-position: top; background-repeat: no-repeat; display: flex; flex-direction: column; align-items: center; align-content: center; padding-top: 30%; color: #ffffff;" >
            <div style="background-color: rgba(0,0,0,0.5); color: #FFFFFF; width: 100%; height: 50%; padding: 50px;">
                <h1> CHEF EM CASA</h1>
                <h3> O maior portal de Chefs de cozinha do Brasil!</h3>
            </div>
        </div>
		
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
						<a class="nav-link" href="sobre.php">Sobre</a>
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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($logado == '' && $logado == null) echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>'?>
				</ul>
			</div>
		</nav>
        
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
				</div>
				<div class="col-md-2 sidenav">
					<div class="card" style="width: 100%;"> 
                        <div class="card-body">
                            <h5 class="card-title"> titulo do card </h5>
                            <h6 class="card-subtitle mb-2 text-muted"> descrição </h6>
                            <p class="card-text"><a href="#"> link </a></p>
                        </div>
                    </div>
				</div>
			</div>
        </div>
		
		<script src="dist/js/bundle.js" type="text/javascript"></script>
<!--        <script src='https://www.google.com/recaptcha/api.js'></script> -->
	</body>
</html>
