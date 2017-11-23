<?php

require_once(__DIR__."/../model/Actividad.php");
require_once(__DIR__."/../model/ActividadMapper.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");


require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class ActividadesController extends BaseController {


	private $actividadMapper;

	public function __construct() {
		parent::__construct();

		$this->actividadMapper = new ActividadMapper();
		$this->userMapper = new UserMapper();
	}


	public function index() {

		$actividades = $this->actividadMapper->findAll();

		$this->view->setVariable("actividades", $actividades);

		$this->view->render("actividades", "index");
	}


	public function view(){
		if (!isset($_GET["idactividad"])) {
			throw new Exception("idactividad is mandatory");
		}

		$actividadid = $_GET["idactividad"];

		$actividad = $this->actividadMapper->findById($actividadid);

		if ($actividad == NULL) {
			throw new Exception("no such exercise with id: ".$actividadid);
		}

		$this->view->setVariable("actividad", $actividad);

		$this->view->render("actividades", "view");

	}

	public function add() {
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding actividades requires login");
		}
		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}

		$actividad = new Actividad();

		if (isset($_POST["submit"])) {

			$actividad->setnombreactividad($_POST["nombreactividad"]);
			$actividad->setdescripcionactividad($_POST["descripcionactividad"]);
			$actividad->setdia($_POST["dia"]);
			$actividad->sethora($_POST["hora"]);
			$actividad->setcapacidad($_POST["capacidad"]);


			try {
				$actividad->checkIsValidForCreate();

				$this->actividadMapper->save($actividad);


				$this->view->setFlash(sprintf(i18n("Actividad \"%s\" añadido."),$actividad ->getnombreactividad()));


				$this->view->redirect("actividades", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("actividad", $actividad);


		$this->view->render("actividades", "add");

	}


	public function edit() {

		if (!isset($_REQUEST["idactividad"])) {
			throw new Exception("A actividad idactividad is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing actividades requires login");
		}
		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}


		$actividadid = $_REQUEST["idactividad"];
		$actividad = $this->actividadMapper->findById($actividadid);

		if ($actividad == NULL) {
			throw new Exception("no such exercise with idactividad: ".$actividadid);
		}


		if (isset($_POST["submit"])) {


			$actividad->setnombreactividad($_POST["nombreactividad"]);
			$actividad->setdescripcionactividad($_POST["descripcionactividad"]);
			$actividad->setdia($_POST["dia"]);
			$actividad->sethora($_POST["hora"]);
			$actividad->setcapacidad($_POST["capacidad"]);


			try {

				$actividad->checkIsValidForUpdate();


				$this->actividadMapper->update($actividad);


				$this->view->setFlash(sprintf(i18n("Actividad \"%s\" actualizado."),$actividad ->getnombreactividad()));


				$this->view->redirect("actividades", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}



		$this->view->setVariable("actividad", $actividad);


		$this->view->render("actividades", "edit");
	}


	public function delete() {
		if (!isset($_POST["idactividad"])) {
			throw new Exception("idactividad is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing actividades requires login");
		}
		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}


		$actividadid = $_REQUEST["idactividad"];
		$actividad = $this->actividadMapper->findById($actividadid);


		if ($actividad == NULL) {
			throw new Exception("no such exercise with id: ".$actividadid);
		}




		$this->actividadMapper->delete($actividad);


		$this->view->setFlash(sprintf(i18n("Actividad \"%s\" eliminado."),$actividad ->getnombreactividad()));


		$this->view->redirect("actividades", "index");

	}
}


	?>
