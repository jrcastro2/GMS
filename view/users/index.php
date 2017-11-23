<?php
//file: view/ejercicios/index.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$users = $view->getVariable("users");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "users");

?><h1><?=i18n("Usuarios")?></h1>

<?php if (isset($currentuser)): ?>
	<div class="col-md-12">
      <a href="index.php?controller=users&amp;action=register" title="<?=i18n("Nuevo usuario");?>"></a>
    </div>
<?php endif; ?>
<table class='tablas'>
	<tr>
		<th><?= i18n("Nombre de usuario")?></th><th><?= i18n("Contraseña")?></th><th><?= i18n("Correo")?></th><th><?= i18n("Tipo de usuario")?></th><th><?= i18n("Acciones")?></th>
		<section>

		</section>

</tr>

	<?php foreach ($users as $user): ?>
		<tr>
			<td>
				<p href="index.php?controller=users&amp;action=view&amp;nombreusuario=<?= $user->getUsername() ?>"><?= htmlentities($user->getUsername()) ?></p>
			</td>
			<td>
				<?= $user->getPassword() ?>
			</td>
			<td>
				<?= $user->getMail() ?>
			</td>
			<td>
				<?= $user->getUserType() ?>
			</td>
			<td>

				<?php
				// 'Delete Button': show it as a link, but do POST in order to preserve
				// the good semantic of HTTP
				?>
				<form
				method="POST"
				action="index.php?controller=users&amp;action=delete"
				id="delete_usuario_<?= $user->getUsername(); ?>"
				style="display: inline"
				>

				<input type="hidden" name="nombreusuario" value="<?= $user->getUsername() ?>">

				<a href="#"
				onclick="
				if (confirm('<?= i18n("estas seguro?")?>')) {
					document.getElementById('delete_usuario_<?= $user->getUsername() ?>').submit()
				}"
				><?= i18n("Eliminar") ?></a>

			</form>

			&nbsp;

			<?php
			// 'Edit Button'
			?>
			<a href="index.php?controller=users&amp;action=edit&amp;nombreusuario=<?= $user->getUsername() ?>"><?= i18n("Editar") ?></a>



	</td>
</tr>
<?php endforeach; ?>

</table>
