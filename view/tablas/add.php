<?php
//file: view/tablas/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$ejercicio = $view->getVariable("ejercicio");
$tabla = $view->getVariable("tabla");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Tabla");

?><h1><?= i18n("Crear tabla")?></h1>
<form action="index.php?controller=tablas&amp;action=add" method="POST">
<div class='form'>
	<?= i18n("Nombre") ?>: <input type="text" name="nombretabla"
	value="<?= $tabla->getNombre() ?>">
	<?= isset($errors["nombretabla"])?i18n($errors["nombretabla"]):"" ?><br>


	<?= i18n("Ejercicio 1") ?>: <input type="text" name="nombreejercicio1">
	<?= isset($errors["nombreejercicio1"])?i18n($errors["nombreejercicio1"]):"" ?><br>

	<?= i18n("Ejercicio 2") ?>: <input type="text" name="nombreejercicio2">
	<?= isset($errors["nombreejercicio2"])?i18n($errors["nombreejercicio2"]):"" ?><br>

	<?= i18n("Ejercicio 3") ?>: <input type="text" name="nombreejercicio3">
	<?= isset($errors["nombreejercicio3"])?i18n($errors["nombreejercicio3"]):"" ?><br>

	<?= i18n("Ejercicio 4") ?>: <input type="text" name="nombreejercicio4">
	<?= isset($errors["nombreejercicio4"])?i18n($errors["nombreejercicio4"]):"" ?><br>

	<?= i18n("Ejercicio 5") ?>: <input type="text" name="nombreejercicio5">
	<?= isset($errors["nombreejercicio5"])?i18n($errors["nombreejercicio5"]):"" ?><br>
</div>


	<input type="submit" name="submit" value="crear">
</form>
