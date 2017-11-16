<?php
//file: view/users/login.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
?>

<h1><?= i18n("Entrar") ?></h1>
<?= isset($errors["general"])?$errors["general"]:"" ?>

<form action="index.php?controller=users&amp;action=login" method="POST">
	<?= i18n("Nombre de usuario")?>: <input type="text" name="nombreusuario">
	<?= i18n("Contraseña")?>: <input type="password" name="contraseña">
	<input type="submit" value="<?= i18n("Entrar") ?>">
</form>

<p><?= i18n("Nuevo aqui?")?> <a href="index.php?controller=users&amp;action=register"><?= i18n("Registrate aqui!")?></a></p>
<?php $view->moveToFragment("css");?>
<link rel="stylesheet" type="text/css" src="css/style2.css">
<?php $view->moveToDefaultFragment(); ?>
