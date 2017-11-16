<?php
//file: view/tablas/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Tabla");

?><h1><?= i18n("Crear tabla")?></h1>
<form action="index.php?controller=tablas&amp;action=add" method="POST">
	<?= i18n("Nombre") ?>: <input type="text" name="nombretabla"
	value="<?= $tabla->getNombre() ?>">
	<?= isset($errors["nombretabla"])?i18n($errors["nombretabla"]):"" ?><br>

	<input type="submit" name="submit" value="submit">
</form>
