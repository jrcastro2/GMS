<?php
//file: view/tablas/edit.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$ejercicios = $view->getVariable("ejercicios");
$ejercicio = $view->getVariable("ejercicio");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Tabla");

?><h1><?= i18n("Modificar Tabla") ?></h1>
<form action="index.php?controller=tablas&amp;action=edit" method="POST">
	<?= i18n("Nombre") ?>: <input type="text" name="nombretabla"
	value="<?= isset($_POST["nombretabla"])?$_POST["nombretabla"]:$tabla->getNombre() ?>">
	<?= isset($errors["nombretabla"])?i18n($errors["nombretabla"]):"" ?><br>

	<?php foreach($ejercicios as $ejercicio): ?>
		<p><?=  i18n("Ejercicio").": ".htmlentities($ejercicio->getTitle()) ?> </p>

		<a href="index.php?controller=tablas&amp;action=deleteEjercicio&amp;idejercicio=<?=$ejercicio->getId()?>&amp;idtabla=<?=$tabla->getId()?>" class="	glyphicon glyphicon-remove" title="<?=i18n("Unshare note")?>"></a>
	  <hr>

	<?php endforeach; ?>
	<?= i18n("Ejercicio") ?>: <input type="text" name="nombreejercicio1">
	<?= isset($errors["nombreejercicio1"])?i18n($errors["nombreejercicio1"]):"" ?><br>

	<?= i18n("Ejercicio") ?>: <input type="text" name="nombreejercicio2">
	<?= isset($errors["nombreejercicio2"])?i18n($errors["nombreejercicio2"]):"" ?><br>

	<?= i18n("Ejercicio") ?>: <input type="text" name="nombreejercicio3">
	<?= isset($errors["nombreejercicio3"])?i18n($errors["nombreejercicio3"]):"" ?><br>

	<?= i18n("Ejercicio") ?>: <input type="text" name="nombreejercicio4">
	<?= isset($errors["nombreejercicio4"])?i18n($errors["nombreejercicio4"]):"" ?><br>

	<?= i18n("Ejercicio") ?>: <input type="text" name="nombreejercicio5">
	<?= isset($errors["nombreejercicio5"])?i18n($errors["nombreejercicio5"]):"" ?><br>

	<input type="hidden" name="idtabla" value="<?= $tabla->getId() ?>">
	<input type="submit" name="submit" value="<?= i18n("Modificar tabla") ?>">
</form>
