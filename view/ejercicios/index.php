<?php
//file: view/ejercicios/index.php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$ejercicios = $view->getVariable("ejercicios");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "Ejercicios");

?><h1><?=i18n("Ejercicios")?></h1>

<?php if (isset($currentuser)): ?>
	
	<div class="col-md-12">
      <a class="glyphicon glyphicon-plus" id="nuevo-ejercicio" href="index.php?controller=ejercicios&amp;action=add" title="<?=i18n("Nuevo ejercicio");?>"></a>
    </div>
<?php endif; ?>
<table class='tablas'>
	<tr>
		<th><?= i18n("Nombre")?></th><th><?= i18n("Descripcion")?></th><th><?= i18n("Series")?></th><th><?= i18n("Repeticiones")?></th><th><?= i18n("Acciones")?></th>
	</tr>

	<?php foreach ($ejercicios as $ejercicio): ?>
		<tr>
			<td>
				<a href="index.php?controller=ejercicios&amp;action=view&amp;idejercicio=<?= $ejercicio->getId() ?>"><?= htmlentities($ejercicio->getTitle()) ?></a>
			</td>
			<td>
				<?= $ejercicio->getContent() ?>
			</td>
			<td>
				<?= $ejercicio->getSeries() ?>
			</td>
			<td>
				<?= $ejercicio->getRepeticiones() ?>
			</td>
			<td>

				<?php
				// 'Delete Button': show it as a link, but do POST in order to preserve
				// the good semantic of HTTP
				?>
				<form
				method="POST"
				action="index.php?controller=ejercicios&amp;action=delete"
				id="delete_exercise_<?= $ejercicio->getId(); ?>"
				style="display: inline"
				>

				<input type="hidden" name="idejercicio" value="<?= $ejercicio->getId() ?>">

				<a href="#"
				onclick="
				if (confirm('<?= i18n("estas seguro?")?>')) {
					document.getElementById('delete_exercise_<?= $ejercicio->getId() ?>').submit()
				}"
				><?= i18n("Eliminar") ?></a>

			</form>

			&nbsp;

			<?php
			// 'Edit Button'
			?>
			<a href="index.php?controller=ejercicios&amp;action=edit&amp;idejercicio=<?= $ejercicio->getId() ?>"><?= i18n("Editar") ?></a>


	</td>
</tr>
<?php endforeach; ?>

</table>
