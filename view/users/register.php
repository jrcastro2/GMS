<?php
//file: view/users/register.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
$user = $view->getVariable("user");
$view->setVariable("title", "Register");
?>
<h1><?= i18n("Registro")?></h1>
<form action="index.php?controller=users&amp;action=register" method="POST">
	<?= i18n("Nombre de usuario")?>: <input type="text" name="nombreusuario"
	value="<?= $user->getUsername() ?>">
	<?= isset($errors["nombreusuario"])?i18n($errors["nombreusuario"]):"" ?><br>

	<?= i18n("Contraseña")?>: <input type="password" name="contraseña"
	value="">
	<?= isset($errors["contraseña"])?i18n($errors["contraseña"]):"" ?><br>

	<input type="submit" value="<?= i18n("Registro")?>">
</form>
