<?php
//file: view/actividades/edit.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Actividad");

?><h1><?= i18n("Modificar Actividad") ?></h1>

<div class=crearEjercicio>
	<form action="index.php?controller=actividades&amp;action=edit" method="POST">
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


		<input type="hidden" name="idactividad" value="<?= $actividad->getidactividad() ?>">
		<input type="submit" name="submit" value="<?= i18n("Modificar actividad") ?>">
	</form>
</div>
