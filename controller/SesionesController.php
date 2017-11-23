  
<?php

require_once(__DIR__."/../model/Sesion.php");
require_once(__DIR__."/../model/SesionMapper.php");
require_once(__DIR__."/../model/User.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class SesionesController extends BaseController {


	private $sesionMapper;

	public function __construct() {
		parent::__construct();

		$this->sesionMapper = new SesionMapper();
	}


	public function index() {

		$sesiones = $this->sesionMapper->findAll();

		$this->view->setVariable("sesiones", $sesiones);

		$this->view->render("sesiones", "index");
	}


	public function view(){
		if (!isset($_GET["idsesion"])) {
			throw new Exception("id is mandatory");
		}

		$sesionid = $_GET["idsesion"];

		$sesion = $this->sesionMapper->findById($sesionid);

		if ($sesion == NULL) {
			throw new Exception("no such sesion with id: ".$sesionid);
		}

		$this->view->setVariable("sesion", $sesion);

		$this->view->render("sesiones", "view");

	}

	public function comentario(){
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding comentarios requires login");
			$this->view->render("sesiones", "comentario");
		}

	}

	public function add() {
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding sesiones de entrenamiento requires login");
		}

		$sesion = new SesionEntrenamiento();

		if (isset($_POST["submit"])) {

			$sesion->setFechaSesion($_POST["fechasesion"]);
			$sesion->setDuracionSesion($_POST["duracionsesion"]);
			$sesion->setComentario($_POST["comentario"]);
			$sesion->setUsuario_idusuario($_POST["Usuario_idusuario"]);


			try {
				$sesion->checkIsValidForCreate();

				$this->sesionMapper->save($sesion);


				$this->view->setFlash(sprintf(i18n("Sesion de Entrenamiento del  \"%s\" añadido."),$sesion ->getFechaSesion()));


				$this->view->redirect("sesiones", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("sesion", $sesion);


		$this->view->render("sesiones", "add");

	}


	public function edit() {
		if (!isset($_REQUEST["idsesion"])) {
			throw new Exception("A exercise id is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing sesiones requires login");
		}


		$sesionid = $_REQUEST["idsesion"];
		$sesion = $this->sesionMapper->findById($sesionid);

		if ($sesion == NULL) {
			throw new Exception("no such exercise with id: ".$sesionid);
		}


		if (isset($_POST["submit"])) {


			$sesion->setFechaSesion($_POST["fechasesion"]);
			$sesion->setDuracionSesion($_POST["duracionsesion"]);
			$sesion->setComentario($_POST["comentario"]);
			$sesion->setUsuario_idusuario($_POST["Usuario_idusuario"]);


			try {

				$sesion->checkIsValidForUpdate();


				$this->sesionMapper->update($sesion);


				$this->view->setFlash(sprintf(i18n("Sesion de Entrenamiento \"%s\" actualizado."),$sesion ->getTitle()));


				$this->view->redirect("sesiones", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("sesion", $sesion);


		$this->view->render("sesiones", "edit");
	}


	public function delete() {
		if (!isset($_POST["idsesion"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing sesiones requires login");
		}


		$sesionid = $_REQUEST["idsesion"];
		$sesion = $this->sesionMapper->findById($sesionid);


		if ($sesion == NULL) {
			throw new Exception("no such exercise with id: ".$sesionid);
		}




		$this->sesionMapper->delete($sesion);


		$this->view->setFlash(sprintf(i18n("Sesion de Entrenamiento del  \"%s\" eliminado."),$sesion ->getFechaSesion()));


		$this->view->redirect("sesiones", "index");

	}
}
