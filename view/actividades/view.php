<?php
//file: view/actividades/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View Actividad");


?><h1><?= i18n("Actividad").": ".htmlentities($actividad->getnombreactividad()) ?></h1>
<h2>
	<?= i18n("Descripcion").": ".htmlentities($actividad->getdescripcionactividad()) ?>
</h2>
<p>
	<?= i18n("dia").": ".htmlentities($actividad->getdia()) ?>
</p>

<p>
	<?= i18n("hora").": ".htmlentities($actividad->gethora()) ?>
</p>

<p>
	<?= i18n("capacidad").": ".htmlentities($actividad->getcapacidad()) ?>
</p>
