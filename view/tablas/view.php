<?php
//file: view/ejercicios/view.phpadssdsa
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$ejercicios = $view->getVariable("ejercicios");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View Tabla");

?><h1><?= i18n("Tabla").": ".htmlentities($tabla->getNombre()) ?></h1>

<?php foreach($ejercicios as $ejercicio): ?>
	<p><?=  i18n("Ejercicio").": ".htmlentities($ejercicio->getTitle()) ?> </p>
  <hr>
<?php endforeach; ?>
