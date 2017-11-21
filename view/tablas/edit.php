<?php
//file: view/tablas/edit.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$ejercicios = $view->getVariable("ejercicios");
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

	<input type="hidden" name="idtabla" value="<?= $tabla->getId() ?>">
	<input type="submit" name="submit" value="<?= i18n("Modificar tabla") ?>">
</form>
