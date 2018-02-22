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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </head>
	
	<body>
        
		<?php include('modal/modal-add-user.php'); ?>
	
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-md-12 text-left" style="padding: 0;">
					
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="img/burger.jpg" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.4)">
                            <h5>Título do item 1</h5>
                            <p>Descrição lorem lorem lorem ipsum lorem </p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="img/cake.jpg" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.4)">
                            <h5>Título do item 2</h5>
                            <p>Descrição lorem lorem lorem ipsum lorem </p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="img/pizza.jpg" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.4)">
                            <h5>Título do item 3</h5>
                            <p>Descrição lorem lorem lorem ipsum lorem </p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="img/food.jpg" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.4)">
                            <h5>Título do item 4</h5>
                            <p>Descrição lorem lorem lorem ipsum lorem </p>
                          </div>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
				</div>
			</div>
		</div>
        
        <script src="js/load.js" type="text/javascript"></script>
		<script src="js/functions.js" type="text/javascript"></script>
		<script src="js/validator.js" type="text/javascript"></script>
        <script src="js/img.js" type="text/javascript"></script>
		<script src="js/ana.js" type="text/javascript"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>
