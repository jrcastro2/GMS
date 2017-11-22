<?php
//file: view/ejercicios/view.phpadssdsa
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$ejercicios = $view->getVariable("ejercicios");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$numero= 1;

$view->setVariable("title", "View Tabla");

?><h1><?= htmlentities($tabla->getNombre()) ?></h1>

<h3><?= i18n("Ejercicios") ?></h3>
<table class='tablas'>
	<tr>
		<th><?= i18n("Orden")?></th><th><?= i18n("Ejercicio")?></th><th><?= i18n("Series")?></th><th><?= i18n("Repeticiones")?></th>
	</tr>
<?php foreach($ejercicios as $ejercicio): ?>
	<tr>
		<td>
			<?=$numero++ ?></a>
		</td>
		<td>
			<a href="index.php?controller=ejercicios&amp;action=view&amp;idejercicio=<?= $ejercicio->getId() ?>"><?= htmlentities($ejercicio->getTitle()) ?></a>
		</td>
		<td>
			<?= $ejercicio->getSeries() ?>
		</td>
		<td>
			<?= $ejercicio->getRepeticiones() ?>
		</td>
	</tr>

<?php endforeach; ?>
