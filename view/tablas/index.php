<?php
//file: view/tablas/index.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tablas = $view->getVariable("tablas");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "Tablas");

?><h1><?=i18n("Tablas")?></h1>

<?php if (isset($currentuser)): ?>
	<div class="col-md-12">
  <a class="glyphicon glyphicon-plus" id="nueva-tabla" href="index.php?controller=tablas&amp;action=add" title="<?=i18n("Nueva tabla");?>"></a>
    </div>
<?php endif; ?>

<table class='tablas'>
	<tr>
		<th><?= i18n("Nombre")?></th><th><?= i18n("Acciones")?></th>
	</tr>

	<?php foreach ($tablas as $tabla): ?>
		<tr>
			<td>
				<a href="index.php?controller=tablas&amp;action=view&amp;idtabla=<?= $tabla->getId() ?>"><?= htmlentities($tabla->getNombre()) ?></a>
			</td>
			<td>

				<?php
				// 'Delete Button': show it as a link, but do POST in order to preserve
				// the good semantic of HTTP
				?>
				<form
				method="POST"
				action="index.php?controller=tablas&amp;action=delete"
				id="delete_exercise_<?= $tabla->getId(); ?>"
				style="display: inline"
				>

				<input type="hidden" name="idtabla" value="<?= $tabla->getId() ?>">

				<a href="#"
				onclick="
				if (confirm('<?= i18n("estas seguro?")?>')) {
					document.getElementById('delete_exercise_<?= $tabla->getId() ?>').submit()
				}"
				><?= i18n("Eliminar") ?></a>

			</form>

			&nbsp;

			<?php
			// 'Edit Button'
			?>
			<a href="index.php?controller=tablas&amp;action=edit&amp;idtabla=<?= $tabla->getId() ?>"><?= i18n("Editar") ?></a>


	</td>
</tr>
<?php endforeach; ?>

</table>
