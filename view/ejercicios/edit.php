<?php
//file: view/ejercicios/edit.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$ejercicio = $view->getVariable("ejercicio");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Ejercicio");

?><h1><?= i18n("Modificar Ejercicio") ?></h1>

<div class=crearEjercicio>
	<form action="index.php?controller=ejercicios&amp;action=edit" method="POST">
		<?= i18n("Nombre") ?>: <input type="text" name="nombreejercicio"
		value="<?= isset($_POST["nombreejercicio"])?$_POST["nombreejercicio"]:$ejercicio->getTitle() ?>">
		<?= isset($errors["nombreejercicio"])?i18n($errors["nombreejercicio"]):"" ?><br>

		<?= i18n("Descripcion") ?>: <br>
		<textarea name="descripcionejercicio" rows="4" cols="50"><?=
		isset($_POST["descripcionejercicio"])?
		htmlentities($_POST["descripcionejercicio"]):
		htmlentities($ejercicio->getContent())
		?></textarea>
		<?= isset($errors["descripcionejercicio"])?i18n($errors["descripcionejercicio"]):"" ?><br>


		<?= i18n("Series") ?>: <input type="text" name="numeroseries"
		value="<?= isset($_POST["numeroseries"])?$_POST["numeroseries"]:$ejercicio->getSeries() ?>">
		<?= isset($errors["numeroseries"])?i18n($errors["numeroseries"]):"" ?><br>

		<?= i18n("Repeticiones") ?>: <input type="text" name="numerorepeticiones"
		value="<?= isset($_POST["numerorepeticiones"])?$_POST["numerorepeticiones"]:$ejercicio->getRepeticiones() ?>">
		<?= isset($errors["numerorepeticiones"])?i18n($errors["numerorepeticiones"]):"" ?><br>


		<input type="hidden" name="idejercicio" value="<?= $ejercicio->getId() ?>">
		<input type="submit" name="submit" value="<?= i18n("Modificar ejercicio") ?>">
	</form>
</div>
