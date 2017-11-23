<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cardio: Free One Page Template by Luka Cvetinovic</title>
	<meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="css/cardio.css">
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Intro</a></li>
					<li><a href="#services">Servicios</a></li>
					<li><a href="#team">Equipo</a></li>
					<li><a href="#pricing">Precios</a></li>
          <li><a href="index.php?controller=ejercicios&amp;action=index"><?= i18n("Ejercicios") ?></a></li>
          <li><a href="index.php?controller=tablas&amp;action=index"><?= i18n("Tablas") ?></a></li>
					<li><a href="index.php?controller=actividades&amp;action=index"><?= i18n("Actividades") ?></a></li>
					<li><a href="index.php?controller=users&amp;action=index"><?= i18n("Usuarios") ?></a></li>
          <li><a href="index.php?controller=users&amp;action=login" ><?= i18n("Login") ?></a></li>

				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Cuida tu cuerpo.</h3>
							<h1 class="white typed">Es el unico lugar en el que vas vivir.</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-4">
					<div class="intro-table intro-table-first">
						<h5 class="white heading">Horario</h5>
						<div class="owl-carousel owl-schedule bottom">
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Pabellon</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Sala de musculacion</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Sala de cardio</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Pabellon</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">>Sala de musculacion</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Sala de cardio</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Pabellon</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">>Sala de musculacion</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Sala de cardio</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Hazte Premium</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Registrate ahora</h4>
							<h4 class="white heading small-pt">20% Descuento</h4>
							<a href="#" class="btn btn-white-fill expand">Registrate</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-third">
						<h5 class="white heading">Opiniones de los clientes</h5>
						<div class="owl-testimonials bottom">
							<div class="item">
								<h4 class="white heading content">No podria estar mas feliz con los resultados!</h4>
								<h5 class="white heading light author">Joshua Rodriguez</h5>
							</div>
							<div class="item">
								<h4 class="white heading content">No me creo lo mucho que ligo!</h4>
								<h5 class="white heading light author">Domingo Rivera</h5>
							</div>
							<div class="item">
								<h4 class="white heading content">Transformacion increible y me siento muy sano!</h4>
								<h5 class="white heading light author">Jose Javier</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Servicios</h2>
				<h4 class="light muted">Consigue los mejores resultados con nuestra gran variedad de ejercicios y tablas personalizadas!</h4>
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Entrenamiento de cardio</h4>
						<p class="description">Con este plan de entrenamiento, solo necesitas un cuarto de hora al día. Lo único que tendrás que hacer es ser constante, ya que tendrás que repetirlo cinco días a la semana.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/guru-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Yoga Pilates</h4>
						<p class="description">El yoga mejora la salud de quienes lo practican, gracias a sus múltiples beneficios. Las posturas de yoga no dejan de sorprender por los beneficios que se consiguen.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Entrenamiento de musculacion</h4>
						<p class="description">Musculación, nutrición y suplementación. Rutinas de entrenamiento para objetivos de volumen muscular, definición y fuerza con dietas muy efectivas.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Equipo</h2>
				<h4 class="light muted">Somos un equipo de ensueño!</h4>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover1.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h5 class="light light-white">1 - 5 sesiones / mes</h5>
							</div>
						</div>
						<img src="img/team/team3.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Domingo Rivera</h4>
							<h5 class="muted regular">Instructor Fitness</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover2.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h5 class="light light-white">1 - 5 sesiones / mes</h5>
							</div>
						</div>
						<img src="img/team/team1.png" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Javier Romero</h4>
							<h5 class="muted regular">Entrenador Personal</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover3.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h5 class="light light-white">1 - 5 sesiones / mes</h5>
							</div>
						</div>
						<img src="img/team/team2.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Joshua Rodriguez</h4>
							<h5 class="muted regular">Entrenador Personal</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="pricing" class="section">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top white">Precios</h2>
				<h4 class="light white">Elige tu mejor plan y apuntate hoy mismo!</h4>
			</div>
			<div class="row no-margin">
				<div class="col-md-7 no-padding col-md-offset-5 pricings text-center">
					<div class="pricing">
						<div class="box-main active" data-img="img/pricing1.jpg">
							<h4 class="white">Yoga</h4>
							<h4 class="white regular light">850.00€ <span class="small-font">/ año</span></h4>
							<i class="info-icon icon_question"></i>
						</div>
						<div class="box-second active">
							<ul class="white-list text-left">
								<li>Un entrenador personal</li>
								<li>Gran espacio para entrenar</li>
								<li>Todos los objetos</li>
								<li>Taquilla gratis</li>
								<li>Ducha gratis</li>
							</ul>
						</div>
					</div>
					<div class="pricing">
						<div class="box-main" data-img="img/pricing2.jpg">
							<h4 class="white">Entrenamiento Cardio</h4>
							<h4 class="white regular light">100.00€ <span class="small-font">/ año</span></h4>
							<i class="info-icon icon_question"></i>
						</div>
						<div class="box-second">
							<ul class="white-list text-left">
                <li>Un entrenador personal</li>
								<li>Gran espacio para entrenar</li>
								<li>Todos los objetos</li>
								<li>Taquilla gratis</li>
								<li>Ducha gratis</li>
							</ul>
						</div>
					</div>
          <div class="pricing">
						<div class="box-main" data-img="img/pricing2.jpg">
							<h4 class="white">Entrenamiento Musculacion</h4>
							<h4 class="white regular light">100.00€ <span class="small-font">/ año</span></h4>
							<i class="info-icon icon_question"></i>
						</div>
						<div class="box-second">
							<ul class="white-list text-left">
                <li>Un entrenador personal</li>
								<li>Gran espacio para entrenar</li>
								<li>Todos los objetos</li>
								<li>Taquilla gratis</li>
								<li>Ducha gratis</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Para disfrutar de una buena salud debes entrenar.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Para mejorar siempre hay que sufrir.</h4>
							<h4 class="light-white light">#motivation #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">GMS simplemente excelente.</h4>
							<h4 class="light-white light">#gym #training #motivation</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Sign Up</h3>
				<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pricing Plan
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
							<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h5 class="light regular light-white">Mueve tu cuerpo y mejora tu salud.</h5>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Opening Hours <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Mon - Fri</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Sat - Sun</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
          <p style= "text-align: center;">
    		Area de Benestar, Saude e Deporte da Universidade de Vigo | <a href="mailto:deportes@uvigo.es">
    		deportes@uvigo.es
    		</a>
    		| Telefono: 986 812 182

    	</p>

				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">

						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
