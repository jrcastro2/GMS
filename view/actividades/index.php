<?php
//file: view/actividades/index.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividades = $view->getVariable("actividades");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("nombreactividad", "Actividades");

?><h1><?=i18n("Actividades")?></h1>

<?php if (isset($currentuser)): ?>
	<div class="col-md-12">
    <a class="glyphicon glyphicon-plus" id="nuevo-ejercicio" href="index.php?controller=actividades&amp;action=add" title="<?=i18n("Nueva actividad");?>"></a>
    </div>
<?php endif; ?>

<table class= 'tablas'>
	<tr>
		<th><?= i18n("Nombre")?></th><th><?= i18n("Descripcion")?></th><th><?= i18n("dia")?></th><th><?= i18n("hora")?></th><th><?= i18n("capacidad")?></th><th><?= i18n("Acciones")?></th>
	</tr>

	<?php foreach ($actividades as $actividad): ?>
		<tr>
			<td>
				<a href="index.php?controller=actividades&amp;action=view&amp;idactividad=<?= $actividad->getidactividad() ?>"><?= htmlentities($actividad->getnombreactividad()) ?></a>
			</td>
			<td>
				<?= $actividad->getdescripcionactividad() ?>
			</td>
			<td>
				<?= $actividad->getdia() ?>
			</td>
			<td>
				<?= $actividad->gethora() ?>
			</td>
			<td>
				<?= $actividad->getcapacidad() ?>
			</td>
			<td>

				<?php
				// 'Delete Button': show it as a link, but do POST in order to preserve
				// the good semantic of HTTP
				?>
				<form
				method="POST"
				action="index.php?controller=actividades&amp;action=delete"
				id="delete_actividad_<?= $actividad->getidactividad(); ?>"
				style="display: inline"
				>

				<input type="hidden" name="idactividad" value="<?= $actividad->getidactividad() ?>">

				<a href="#"
				onclick="
				if (confirm('<?= i18n("estas seguro?")?>')) {
					document.getElementById('delete_actividad_<?= $actividad->getidactividad() ?>').submit()
				}"
				><?= i18n("Eliminar") ?></a>

			</form>

			&nbsp;

			<?php
			// 'Edit Button'
			?>
			<a href="index.php?controller=actividades&amp;action=edit&amp;idactividad=<?= $actividad->getidactividad() ?>"><?= i18n("Editar") ?></a>


	</td>
</tr>
<?php endforeach; ?>

</table>
