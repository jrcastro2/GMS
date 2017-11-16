<?php
//file: view/ejercicios/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$ejercicio = $view->getVariable("ejercicio");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View Ejercicio");


?><h1><?= i18n("Ejercicio").": ".htmlentities($ejercicio->getTitle()) ?></h1>

<p>
	<?= i18n("Descripcion").": ".htmlentities($ejercicio->getContent()) ?>
</p>
<p>
	<?= i18n("Numero de series").": ".$ejercicio->getSeries() ?>
</p>
<p>
	<?= i18n("Numero de repeticiones").": ".htmlentities($ejercicio->getRepeticiones()) ?>
</p>
