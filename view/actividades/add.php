<?php
//file: view/actividades/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Edit Actividad");

?><h1><?= i18n("Crear actividad")?></h1>
<div class=crearEjercicio>
<form action="index.php?controller=actividades&amp;action=add" method="POST">
	<?= i18n("Nombre") ?>: <input type="text" name="nombreactividad"
	value="<?= $actividad->getnombreactividad() ?>">
	<?= isset($errors["nombreactividad"])?i18n($errors["nombreactividad"]):"" ?><br>

	<?= i18n("Descripcion") ?>: <br>
	<textarea name="descripcionactividad" rows="4" cols="50"><?=
	htmlentities($actividad->getdescripcionactividad()) ?></textarea>
	<?= isset($errors["descripcionactividad"])?i18n($errors["descripcionactividad"]):"" ?><br>

	<?= i18n("dia") ?>: <input type="text" name="dia"
	value="<?= $actividad->getdia() ?>">
	<?= isset($errors["dia"])?i18n($errors["dia"]):"" ?><br>

	<?= i18n("hora") ?>: <input type="text" name="hora"
	value="<?= $actividad->gethora() ?>">
	<?= isset($errors["hora"])?i18n($errors["hora"]):"" ?><br>

	<?= i18n("capacidad") ?>: <input type="text" name="capacidad"
	value="<?= $actividad->getcapacidad() ?>">
	<?= isset($errors["capacidad"])?i18n($errors["capacidad"]):"" ?><br>



	<input type="submit" name="submit" value="submit">
</form>

</div>
