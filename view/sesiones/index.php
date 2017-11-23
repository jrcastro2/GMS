<?php
//file: view/sesiones/index.php

require_once(__DIR__."/../../core/ViewManager.php");
require_once(__DIR__."/../../core/I18n.php");
require_once(__DIR__."/../../model/Sesion.php");
$view = ViewManager::getInstance();

$sesiones = $view->getVariable("sesiones");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "Sesiones de Entrenamiento");

?><h1><?=i18n("Sesiones de Entrenamiento")?></h1>


<table class='tablas'>
	<tr>
		<th><?= i18n("Fecha de Sesion")?></th><th><?= i18n("Duracion de Sesion")?></th><th><?= i18n("Comentario")?></th><th><?= i18n("Usuario")?></th>
	</tr>

	<?php foreach ((array)$sesiones as $sesion): ?>
		<tr>
			<td>
				<p href="index.php?controller=sesiones&amp;action=view&amp;idsesion=<?= $sesion->getIdSesion() ?>"><?= htmlentities($sesion->getFechaSesion()) ?></p>
			</td>
			<td>
				<?= $sesion->getDuracionSesion() ?>
			</td>
			<td>
				<?= $sesion->getComentario() ?>
			</td>
			<td>
				<?= $sesion->getUsuario_idusuario() ?>
			</td>


			&nbsp;


<?php endforeach; ?>

</table>
