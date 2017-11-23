<?php
//file: view/layouts/default.php

$view = ViewManager::getInstance();
$currentuser = $view->getVariable("currentusername");

?><!DOCTYPE html>
<html>
<head>
	<title><?= $view->getVariable("title", "no title") ?></title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link href='https://fonts.googleapis.com/css?family=Permanent Marker' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Patrick Hand' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/general_js.js"></script>

	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- enable ji18n() javascript function to translate inside your scripts -->
	<script src="index.php?controller=language&amp;action=i18njs">
	</script>
	<?= $view->getFragment("css") ?>
	<?= $view->getFragment("javascript") ?>
</head>
<body  class="body-index">
	<!-- header -->
	<header>
		<nav class="navbar navbar-inverse" id="navfontcolor">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="index.php?controller=ejercicios&amp;action=index">GMS</a>
	      </div>

				<span id="spanlang"> <?php include(__DIR__."/language_select_element.php");?> </span>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?controller=ejercicios&amp;action=index"><?= i18n("Ejercicios") ?></a></li>

					<li><a href="index.php?controller=tablas&amp;action=index"><?= i18n("Tablas") ?></a></li>

					<li><a href="index.php?controller=actividades&amp;action=index"><?= i18n("Actividades") ?></a></li>
					<li><a href="index.php?controller=users&amp;action=index"><?= i18n("Usuarios") ?></a></li>
					<?php if (isset($currentuser)): ?>
	        <li><p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?= $currentuser; ?> </p></li>
					 <li><a href="index.php?controller=users&amp;action=logout"><span class="glyphicon glyphicon-log-in"></span> <?= i18n("Cerrar sesion") ?></a></li>
				 <?php else: ?>
					<li><a href="index.php?controller=users&amp;action=login"><?= i18n("Login") ?></a></li>
					<?php endif ?>
	      </ul>
		</nav>
	</header>

	<main>
		<div id="flash">
			<?= $view->popFlash() ?>
		</div>

		<?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
	</main>

	<footer>

	</footer>

</body>
</html>
