<?php
//file: view/actividades/edit.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$user = $view->getVariable("user");
$users = $view->getVariable("users");
$errors = $view->getVariable("errors");

$view->setVariable("nombreactividad", "Edit Actividad");

?><h1><?= i18n("Modificar Actividad") ?></h1>


	<form action="index.php?controller=actividades&amp;action=edit" method="POST">
	<div class='form'>
		<?= i18n("Nombre") ?>: <input type="text" name="nombreactividad"
		value="<?= isset($_POST["nombreactividad"])?$_POST["nombreactividad"]:$actividad->getnombreactividad() ?>">
		<?= isset($errors["nombreactividad"])?i18n($errors["nombreactividad"]):"" ?><br>

		<?= i18n("Descripcion") ?>: <br>
		<textarea name="descripcionactividad" rows="4" cols="50"><?=
		isset($_POST["descripcionactividad"])?
		htmlentities($_POST["descripcionactividad"]):
		htmlentities($actividad->getdescripcionactividad())
		?></textarea>
		<?= isset($errors["descripcionactividad"])?i18n($errors["descripcionactividad"]):"" ?><br>


		<?= i18n("dia") ?>: <input type="text" name="dia"
		value="<?= isset($_POST["dia"])?$_POST["dia"]:$actividad->getdia() ?>">
		<?= isset($errors["dia"])?i18n($errors["dia"]):"" ?><br>
		
		<?= i18n("hora") ?>: <input type="text" name="hora"
		value="<?= isset($_POST["hora"])?$_POST["hora"]:$actividad->gethora() ?>">
		<?= isset($errors["hora"])?i18n($errors["hora"]):"" ?><br>

		<?= i18n("capacidad") ?>: <input type="text" name="capacidad"
		value="<?= isset($_POST["capacidad"])?$_POST["capacidad"]:$actividad->getcapacidad() ?>">
		<?= isset($errors["capacidad"])?i18n($errors["capacidad"]):"" ?><br>
	</div>
	
	<table class='tablas'>
		<tr>
			<th><?= i18n("Users")?></th><th><?= i18n("Eliminar")?></th>
		</tr>
	<?php foreach($users as $user): ?>
		<tr>
			<td>
				<p><?=  i18n("User").": ".htmlentities($user->getUsername()) ?> </p>
			</td>
			<td>
				<a href="index.php?controller=actividades&amp;action=deleteUsuario&amp;nombreusuario=<?=$user->getUsername()?>&amp;idactividad=<?=$actividad->getidactividad()?>" class="	glyphicon glyphicon-remove" title="<?=i18n("Unshare note")?>"></a>
			</td>
		</tr>

	<?php endforeach; ?>

<h3><?= i18n("Añadir Usuarios") ?></h3>
	<div class='form'>
	<?= i18n("User") ?>: <input type="text" name="nombreuser1">
	<?= isset($errors["nombreuser1"])?i18n($errors["nombreuser1"]):"" ?><br>

	<?= i18n("User") ?>: <input type="text" name="nombreuser2">
	<?= isset($errors["nombreuser2"])?i18n($errors["nombreuser2"]):"" ?><br>

	<?= i18n("User") ?>: <input type="text" name="nombreuser3">
	<?= isset($errors["nombreuser3"])?i18n($errors["nombreuser3"]):"" ?><br>

	<?= i18n("User") ?>: <input type="text" name="nombreuser4">
	<?= isset($errors["nombreuser4"])?i18n($errors["nombreuser4"]):"" ?><br>

	<?= i18n("User") ?>: <input type="text" name="nombreuser5">
	<?= isset($errors["nombreuser5"])?i18n($errors["nombreuser5"]):"" ?><br>
</div>
	
	
		

		<input type="hidden" name="idactividad" value="<?= $actividad->getidactividad() ?>">
		<input type="submit" name="submit" value="<?= i18n("Modificar actividad") ?>">
	</form>
<h3><?= i18n("Lista de usuarios") ?></h3>