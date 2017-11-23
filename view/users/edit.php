<?php
//file: view/ejercicios/add.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$user = $view->getVariable("user");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Editar usuario");

?><h1><?= i18n("Modificar usuario")?></h1>

<div class=crearEjercicio>
	<form action="index.php?controller=users&amp;action=edit" method="POST">

		<?= i18n("Contraseña") ?>: <input type="text" name="contraseña"
		value="<?= isset($_POST["contraseña"])?$_POST["contraseña"]:$user->getPassword() ?>">
		<?= isset($errors["contraseña"])?i18n($errors["contraseña"]):"" ?><br>

		<?= i18n("Correo electronico") ?>: <input type="text" name="correo"
		value="<?= isset($_POST["correo"])?$_POST["correo"]:$user->getMail() ?>">
		<?= isset($errors["correo"])?i18n($errors["correo"]):"" ?><br>

		<?= i18n("Tipo de usuario") ?>: <input type="text" name="tipousuario"
		value="<?= isset($_POST["tipousuario"])?$_POST["tipousuario"]:$user->getUserType() ?>">
		<?= isset($errors["tipousuario"])?i18n($errors["tipousuario"]):"" ?><br>

	<!--	<?= i18n("Tipo de usuario") ?>: <select name="transporte">
		<option>Deportista</option>
		<option>Entrenador</option>
		<option>Administrador</option>
		</select>
		<?= isset($errors["tipousuario"])?i18n($errors["tipousuario"]):"" ?><br>
	-->

		<input type="hidden" name="nombreusuario" value="<?= $user->getUsername() ?>">
		<input type="submit" name="submit" value="<?= i18n("Modificar usuario") ?>">
	</form>
</div>
