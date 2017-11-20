<?php

require_once(__DIR__."/../model/Tabla.php");
require_once(__DIR__."/../model/TablaMapper.php");
require_once(__DIR__."/../model/Ejercicio.php");
require_once(__DIR__."/../model/EjercicioMapper.php");
require_once(__DIR__."/../model/User.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class TablasController extends BaseController {


	private $tablaMapper;
	private $ejercicioMapper;

	public function __construct() {
		parent::__construct();

		$this->tablaMapper = new TablaMapper();
		$this->ejercicioMapper = new EjercicioMapper();
	}


	public function index() {

		$tablas = $this->tablaMapper->findAll();

		$this->view->setVariable("tablas", $tablas);

		$this->view->render("tablas", "index");
	}


	public function view(){
		if (!isset($_GET["idtabla"])) {
			throw new Exception("id es obligatorio");
		}

		$tablaid = $_GET["idtabla"];

		$tabla = $this->tablaMapper->findById($tablaid);
		$ejercicios = $this->tablaMapper->findEjerciciosTabla($tablaid);

		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}

		$this->view->setVariable("ejercicios", $ejercicios);
		$this->view->setVariable("tabla", $tabla);

		$this->view->render("tablas", "view");

	}

	public function add() {
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding tablas requires login");
		}

		$tabla = new Tabla();
		$ejercicio = new Ejercicio();

		if (isset($_POST["submit"])) {

			$tabla->setNombre($_POST["nombretabla"]);
			$nombreEjer = $_POST["nombreejercicio"];
			$ejercicio = $this->ejercicioMapper->findByName($nombreEjer);

			try {
				$tabla->checkIsValidForCreate();

				$this->tablaMapper->save($tabla);

				$tablaF= $this->tablaMapper->findByName($tabla->getNombre());

				$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());


				$this->view->setFlash(sprintf(i18n("Tabla \"%s\" añadido."),$tabla ->getNombre()));


				$this->view->redirect("tablas", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("tabla", $tabla);
		$this->view->setVariable("ejercicio", $ejercicio);


		$this->view->render("tablas", "add");

	}


	public function edit() {
		if (!isset($_REQUEST["idtabla"])) {
			throw new Exception("A table id is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing tablas requires login");
		}


		$tablaid = $_REQUEST["idtabla"];
		$tabla = $this->tablaMapper->findById($tablaid);

		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}


		if (isset($_POST["submit"])) {


			$tabla->setNombre($_POST["nombretabla"]);


			try {

				$tabla->checkIsValidForUpdate();


				$this->tablaMapper->update($tabla);


				$this->view->setFlash(sprintf(i18n("Tabla \"%s\" actualizado."),$tabla ->getNombre()));


				$this->view->redirect("tablas", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("tabla", $tabla);


		$this->view->render("tablas", "edit");
	}


	public function delete() {
		if (!isset($_POST["idtabla"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing tablas requires login");
		}


		$tablaid = $_REQUEST["idtabla"];
		$tabla = $this->tablaMapper->findById($tablaid);


		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}



		$this->tablaMapper->deleteEjerciciosFromTabla($tabla);
		$this->tablaMapper->delete($tabla);


		$this->view->setFlash(sprintf(i18n("Tabla \"%s\" eliminado."),$tabla ->getNombre()));


		$this->view->redirect("tablas", "index");

	}
}
