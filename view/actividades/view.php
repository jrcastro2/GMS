<?php
//file: view/actividades/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$users = $view->getVariable("users");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$numero= 1;


$view->setVariable("nombreactividad", "View Actividad");


?>
<div id="ver-ejercicio">
<h1><?= i18n("Actividad").": ".htmlentities($actividad->getnombreactividad()) ?></h1>
<h2>
	<?= i18n("Descripcion").": ".htmlentities($actividad->getdescripcionactividad()) ?>
</h2>
<p>
	<?= i18n("dia").": ".htmlentities($actividad->getdia()) ?>
</p>

<p>
	<?= i18n("hora").": ".htmlentities($actividad->gethora()) ?>
</p>

<p>
	<?= i18n("capacidad").": ".htmlentities($actividad->getcapacidad()) ?>
</p>

</div>

<h3><?= i18n("Users") ?></h3>
<table class='tablas'>
	<tr>
		<th><?= i18n("Orden")?></th><th><?= i18n("User")?></th><th><?= i18n("correo")?></th><th><?= i18n("tipousuario")?></th>
	</tr>
<?php foreach($users as $user): ?>
	<tr>
		<td>
			<?=$numero++ ?></a>
		</td>
		<td>
			<a href="index.php?controller=users&amp;action=view&amp;nombreusuario=<?= $user->getUsername() ?>"><?= htmlentities($user->getUsername()) ?></a>
		</td>
		<td>
			<?= $user->getMail() ?>
		</td>
		<td>
			<?= $user->getUserType() ?>
		</td>
	</tr>

<?php endforeach; ?>

