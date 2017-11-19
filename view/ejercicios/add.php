<?php
//file: view/ejercicios/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$ejercicio = $view->getVariable("ejercicio");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Ejercicio");

?><h1><?= i18n("Crear ejercicio")?></h1>
<div class=crearEjercicio>
	<form action="index.php?controller=ejercicios&amp;action=add" method="POST">
		<?= i18n("Nombre") ?>: <input type="text" name="nombreejercicio"
		value="<?= $ejercicio->getTitle() ?>">
		<?= isset($errors["nombreejercicio"])?i18n($errors["nombreejercicio"]):"" ?><br>

		<?= i18n("Descripcion") ?>: <br>
		<textarea name="descripcionejercicio" rows="4" cols="50" ><?=
		htmlentities($ejercicio->getContent()) ?></textarea>
		<?= isset($errors["descripcionejercicio"])?i18n($errors["descripcionejercicio"]):"" ?><br>

		<?= i18n("Series") ?>: <input type="text" name="numeroseries"
		value="<?= $ejercicio->getSeries() ?>">
		<?= isset($errors["numeroseries"])?i18n($errors["numeroseries"]):"" ?><br>

		<?= i18n("Repeticiones") ?>: <input type="text" name="numerorepeticiones"
		value="<?= $ejercicio->getRepeticiones() ?>">
		<?= isset($errors["numerorepeticiones"])?i18n($errors["numerorepeticiones"]):"" ?><br>



		<input type="submit" name="submit" value="<?= i18n("Crear ejercicio") ?>">
	</form>
</div>
