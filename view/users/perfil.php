<?php
//file: view/ejercicios/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$user = $view->getVariable("user");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View User");


?><h1 id="vistaejercicio"></h1>
<div id="ver-ejercicio">
	&nbsp;
<p >
	<?=htmlentities($user->getMail()) ?>
</p>
&nbsp;

&nbsp;
<p>
	<?= i18n("Tipo de usuario").": ".$user->getUserType() ?>
</p>

</div>
