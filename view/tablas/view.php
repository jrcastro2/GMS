<?php
//file: view/ejercicios/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View Tabla");


?><h1><?= i18n("Tabla").": ".htmlentities($tabla->getNombre()) ?></h1>
