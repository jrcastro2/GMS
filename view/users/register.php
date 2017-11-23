<?php
//file: view/users/register.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$user = $view->getVariable("user");
$errors = $view->getVariable("errors");
$view->setVariable("title", "register");
?>
<h1><?= i18n("Registro")?></h1>
<div class=crearEjercicio>
<form action="index.php?controller=users&amp;action=register" method="POST">
	<?= i18n("Nombre de usuario")?>: <input type="text" name="nombreusuario"
	value="<?= $user->getUsername() ?>">
	<?= isset($errors["nombreusuario"])?i18n($errors["nombreusuario"]):"" ?><br>

	<?= i18n("Contraseña")?>: <input type=text name="contraseña"
	value="<?= $user->getPassword() ?>">
	<?= isset($errors["contraseña"])?i18n($errors["contraseña"]):"" ?><br>

	<?= i18n("Correo electronico")?>: <input type=text name="correo"
	value="<?= $user->getMail() ?>">
	<?= isset($errors["correo"])?i18n($errors["correo"]):"" ?><br>

	<?= i18n("Tipo de usuario")?>: <input type=text name="tipousuario"
	value="<?= $user->getUserType() ?>">
	<?= isset($errors["tipousuario"])?i18n($errors["tipousuario"]):"" ?><br>

	<input type="submit" name="submit" value="Registrar">
</form>
</div>
