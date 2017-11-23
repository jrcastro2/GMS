<?php

require_once(__DIR__."/../model/Tabla.php");
require_once(__DIR__."/../model/TablaMapper.php");
require_once(__DIR__."/../model/Ejercicio.php");
require_once(__DIR__."/../model/EjercicioMapper.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");


require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class TablasController extends BaseController {


	private $tablaMapper;
	private $ejercicioMapper;

	public function __construct() {
		parent::__construct();

		$this->tablaMapper = new TablaMapper();
		$this->ejercicioMapper = new EjercicioMapper();
		$this->userMapper = new UserMapper();
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
		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}

		$tabla = new Tabla();
		$ejercicio = new Ejercicio();

		if (isset($_POST["submit"])) {

			$tabla->setNombre($_POST["nombretabla"]);

			if(isset($_POST["nombreejercicio1"])){
				$nombreEjer1 = $_POST["nombreejercicio1"];
				$ejercicio1 = $this->ejercicioMapper->findByName($nombreEjer1);
			}

			if(isset($_POST["nombreejercicio2"])){
				$nombreEjer2 = $_POST["nombreejercicio2"];
				$ejercicio2 = $this->ejercicioMapper->findByName($nombreEjer2);
			}

			if(isset($_POST["nombreejercicio3"])){
				$nombreEjer3 = $_POST["nombreejercicio3"];
				$ejercicio3 = $this->ejercicioMapper->findByName($nombreEjer3);
			}

			if(isset($_POST["nombreejercicio4"])){
				$nombreEjer4 = $_POST["nombreejercicio4"];
				$ejercicio4 = $this->ejercicioMapper->findByName($nombreEjer4);
			}

			if(isset($_POST["nombreejercicio5"])){
				$nombreEjer5 = $_POST["nombreejercicio5"];
				$ejercicio5 = $this->ejercicioMapper->findByName($nombreEjer5);
			}




			try {
				$tabla->checkIsValidForCreate();

				$this->tablaMapper->save($tabla);

				$tablaF= $this->tablaMapper->findByName($tabla->getNombre());

				if($nombreEjer1!=null){
					$ejercicio = $ejercicio1;
					if($this->ejercicioMapper->exists($nombreEjer1)){
						$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());
					}
				}

				if($nombreEjer2!=null){
					$ejercicio = $ejercicio2;
					if($this->ejercicioMapper->exists($nombreEjer2)){
						$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());
					}
				}

				if($nombreEjer3!=null){
					$ejercicio = $ejercicio3;
					if($this->ejercicioMapper->exists($nombreEjer3)){
						$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());
					}
				}

				if($nombreEjer4!=null){
					$ejercicio = $ejercicio4;
					if($this->ejercicioMapper->exists($nombreEjer4)){
						$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());
					}
				}

				if($nombreEjer5!=null){
					$ejercicio = $ejercicio5;
					if($this->ejercicioMapper->exists($nombreEjer5)){
						$this->tablaMapper->asignarEjercicioTabla($tablaF->getId(),$ejercicio->getId());
					}
				}




				$this->view->setFlash(sprintf(i18n("Tabla \"%s\" añadida."),$tabla ->getNombre()));


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

		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}

		$ejercicio = new Ejercicio();
		$tablaid = $_REQUEST["idtabla"];
		$tabla = $this->tablaMapper->findById($tablaid);
		$ejercicios = $this->tablaMapper->findEjerciciosTabla($tablaid);

		if(isset($_POST["nombreejercicio1"])){
			$nombreEjer1 = $_POST["nombreejercicio1"];
			$ejercicio1 = $this->ejercicioMapper->findByName($nombreEjer1);
		}

		if(isset($_POST["nombreejercicio2"])){
			$nombreEjer2 = $_POST["nombreejercicio2"];
			$ejercicio2 = $this->ejercicioMapper->findByName($nombreEjer2);
		}

		if(isset($_POST["nombreejercicio3"])){
			$nombreEjer3 = $_POST["nombreejercicio3"];
			$ejercicio3 = $this->ejercicioMapper->findByName($nombreEjer3);
		}

		if(isset($_POST["nombreejercicio4"])){
			$nombreEjer4 = $_POST["nombreejercicio4"];
			$ejercicio4 = $this->ejercicioMapper->findByName($nombreEjer4);
		}

		if(isset($_POST["nombreejercicio5"])){
			$nombreEjer5 = $_POST["nombreejercicio5"];
			$ejercicio5 = $this->ejercicioMapper->findByName($nombreEjer5);
		}

		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}


		if (isset($_POST["submit"])) {


			$tabla->setNombre($_POST["nombretabla"]);


			try {

				$tabla->checkIsValidForUpdate();


				$this->tablaMapper->update($tabla);

				if($nombreEjer1!=null){
					$ejercicio = $ejercicio1;
					if($this->ejercicioMapper->exists($nombreEjer1)){
						if(!$this->tablaMapper->ejercicioAsignado($tabla,$ejercicio)){
							$this->tablaMapper->asignarEjercicioTabla($tabla->getId(),$ejercicio->getId());
						}
					}
				}

				if($nombreEjer2!=null){
					$ejercicio = $ejercicio2;
					if($this->ejercicioMapper->exists($nombreEjer2)){
						if(!$this->tablaMapper->ejercicioAsignado($tabla,$ejercicio)){
							$this->tablaMapper->asignarEjercicioTabla($tabla->getId(),$ejercicio->getId());
						}
					}
				}

				if($nombreEjer3!=null){
					$ejercicio = $ejercicio3;
					if($this->ejercicioMapper->exists($nombreEjer3)){
						if(!$this->tablaMapper->ejercicioAsignado($tabla,$ejercicio)){
							$this->tablaMapper->asignarEjercicioTabla($tabla->getId(),$ejercicio->getId());
						}
					}
				}

				if($nombreEjer4!=null){
					$ejercicio = $ejercicio4;
					if($this->ejercicioMapper->exists($nombreEjer4)){
						if(!$this->tablaMapper->ejercicioAsignado($tabla,$ejercicio)){
							$this->tablaMapper->asignarEjercicioTabla($tabla->getId(),$ejercicio->getId());
						}
					}
				}

				if($nombreEjer5!=null){
					$ejercicio = $ejercicio5;
					if($this->ejercicioMapper->exists($nombreEjer5)){
						if(!$this->tablaMapper->ejercicioAsignado($tabla,$ejercicio)){
							$this->tablaMapper->asignarEjercicioTabla($tabla->getId(),$ejercicio->getId());
						}
					}
				}



				$this->view->setFlash(sprintf(i18n("Tabla \"%s\" actualizada."),$tabla ->getNombre()));


				$this->view->redirect("tablas", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}
		$this->view->setVariable("ejercicio", $ejercicio);
		$this->view->setVariable("ejercicios", $ejercicios);
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

		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}


		$tablaid = $_REQUEST["idtabla"];
		$tabla = $this->tablaMapper->findById($tablaid);


		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}



		$this->tablaMapper->deleteEjerciciosFromTabla($tabla);
		$this->tablaMapper->delete($tabla);


		$this->view->setFlash(sprintf(i18n("Tabla \"%s\" eliminada."),$tabla ->getNombre()));


		$this->view->redirect("tablas", "index");

	}

	public function deleteEjercicio() {
		if (!isset($_GET["idejercicio"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($_GET["idtabla"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing tablas requires login");
		}
		$tablaid = $_REQUEST["idtabla"];
		$tabla = $this->tablaMapper->findById($tablaid);

		$ejercicioid = $_REQUEST["idejercicio"];
		$ejercicio = $this->ejercicioMapper->findById($ejercicioid);


		if ($tabla == NULL) {
			throw new Exception("no such exercise with id: ".$tablaid);
		}



		$this->tablaMapper->deleteEjercicioFromTabla($ejercicio, $tabla);


		$this->view->setFlash(sprintf(i18n("Ejercicio eliminado.")));


		$this->view->redirect("tablas", "index");

	}
}
