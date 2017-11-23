<?php

require_once(__DIR__."/../model/Ejercicio.php");
require_once(__DIR__."/../model/EjercicioMapper.php");
require_once(__DIR__."/../model/UserMapper.php");
require_once(__DIR__."/../model/User.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class EjerciciosController extends BaseController {


	private $ejercicioMapper;

	public function __construct() {
		parent::__construct();

		$this->ejercicioMapper = new EjercicioMapper();
		$this->userMapper = new UserMapper();
	}


	public function index() {

		$ejercicios = $this->ejercicioMapper->findAll();

		$this->view->setVariable("ejercicios", $ejercicios);

		$this->view->render("ejercicios", "index");
	}


	public function view(){
		if (!isset($_GET["idejercicio"])) {
			throw new Exception("id is mandatory");
		}

		$ejercicioid = $_GET["idejercicio"];

		$ejercicio = $this->ejercicioMapper->findById($ejercicioid);

		if ($ejercicio == NULL) {
			throw new Exception("no such exercise with id: ".$ejercicioid);
		}

		$this->view->setVariable("ejercicio", $ejercicio);

		$this->view->render("ejercicios", "view");

	}

	public function add() {
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding ejercicios requires login");
		}

		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}

		$ejercicio = new Ejercicio();

		if (isset($_POST["submit"])) {

			$ejercicio->setTitle($_POST["nombreejercicio"]);
			$ejercicio->setContent($_POST["descripcionejercicio"]);
			$ejercicio->setRepeticiones($_POST["numerorepeticiones"]);
			$ejercicio->setSeries($_POST["numeroseries"]);


			try {
				$ejercicio->checkIsValidForCreate();

				$this->ejercicioMapper->save($ejercicio);


				$this->view->setFlash(sprintf(i18n("Ejercicio \"%s\" añadido."),$ejercicio ->getTitle()));


				$this->view->redirect("ejercicios", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("ejercicio", $ejercicio);


		$this->view->render("ejercicios", "add");

	}


	public function edit() {
		if (!isset($_REQUEST["idejercicio"])) {
			throw new Exception("A exercise id is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing ejercicios requires login");
		}

		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}



		$ejercicioid = $_REQUEST["idejercicio"];
		$ejercicio = $this->ejercicioMapper->findById($ejercicioid);

		if ($ejercicio == NULL) {
			throw new Exception("no such exercise with id: ".$ejercicioid);
		}


		if (isset($_POST["submit"])) {


			$ejercicio->setTitle($_POST["nombreejercicio"]);
			$ejercicio->setContent($_POST["descripcionejercicio"]);
			$ejercicio->setRepeticiones($_POST["numerorepeticiones"]);
			$ejercicio->setSeries($_POST["numeroseries"]);


			try {

				$ejercicio->checkIsValidForUpdate();


				$this->ejercicioMapper->update($ejercicio);


				$this->view->setFlash(sprintf(i18n("Ejercicio \"%s\" actualizado."),$ejercicio ->getTitle()));


				$this->view->redirect("ejercicios", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("ejercicio", $ejercicio);


		$this->view->render("ejercicios", "edit");
	}


	public function delete() {
		if (!isset($_POST["idejercicio"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing ejercicios requires login");
		}

		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}



		$ejercicioid = $_REQUEST["idejercicio"];
		$ejercicio = $this->ejercicioMapper->findById($ejercicioid);


		if ($ejercicio == NULL) {
			throw new Exception("no such exercise with id: ".$ejercicioid);
		}




		$this->ejercicioMapper->delete($ejercicio);


		$this->view->setFlash(sprintf(i18n("Ejercicio \"%s\" eliminado."),$ejercicio ->getTitle()));


		$this->view->redirect("ejercicios", "index");

	}
}
