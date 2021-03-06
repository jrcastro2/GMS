<?php
//file: view/actividades/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$user = $view->getVariable("user");
$errors = $view->getVariable("errors");

$view->setVariable("nombreactividad", "Edit Actividad");

?><h1><?= i18n("Crear actividad")?></h1>

<form action="index.php?controller=actividades&amp;action=add" method="POST">
<div class='form'>
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

	<?= i18n("User 1") ?>: <input type="text" name="nombreuser1">
	<?= isset($errors["nombreuser1"])?i18n($errors["nombreuser1"]):"" ?><br>

	<?= i18n("User 2") ?>: <input type="text" name="nombreuser2">
	<?= isset($errors["nombreuser2"])?i18n($errors["nombreuser2"]):"" ?><br>

	<?= i18n("User 3") ?>: <input type="text" name="nombreuser3">
	<?= isset($errors["nombreuser3"])?i18n($errors["nombreuser3"]):"" ?><br>

	<?= i18n("User 4") ?>: <input type="text" name="nombreuser4">
	<?= isset($errors["nombreuser4"])?i18n($errors["nombreuser4"]):"" ?><br>

	<?= i18n("User 5") ?>: <input type="text" name="nombreuser5">
	<?= isset($errors["nombreuser5"])?i18n($errors["nombreuser5"]):"" ?><br>

</div>
	<input type="submit" name="submit" value="crear">
</form>


