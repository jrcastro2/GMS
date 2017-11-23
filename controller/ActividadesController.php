<?php

require_once(__DIR__."/../model/Actividad.php");
require_once(__DIR__."/../model/ActividadMapper.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class ActividadesController extends BaseController {


	private $actividadMapper;
	private $userMapper;

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

		$users = $this->actividadMapper->findUsuariosActividad($actividadid);

		if ($actividad == NULL) {
			throw new Exception("no such exercise with id: ".$actividadid);
		}

		$this->view->setVariable("users", $users);

		$this->view->setVariable("actividad", $actividad);

		$this->view->render("actividades", "view");

	}

	public function add() {
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Adding actividades requires login");
		}

		$actividad = new Actividad();
		$user = new User();

		if (isset($_POST["submit"])) {

			$actividad->setnombreactividad($_POST["nombreactividad"]);
			$actividad->setdescripcionactividad($_POST["descripcionactividad"]);
			$actividad->setdia($_POST["dia"]);
			$actividad->sethora($_POST["hora"]);
			$actividad->setcapacidad($_POST["capacidad"]);

			if(isset($_POST["nombreuser1"])){
				$nombreUser1 = $_POST["nombreuser1"];
				$user1 = $this->userMapper->findByName($nombreUser1);
			}

			if(isset($_POST["nombreuser2"])){
				$nombreUser2 = $_POST["nombreuser2"];
				$user2 = $this->userMapper->findByName($nombreUser2);
			}

			if(isset($_POST["nombreuser3"])){
				$nombreUser3 = $_POST["nombreuser3"];
				$user3 = $this->userMapper->findByName($nombreUser3);
			}

			if(isset($_POST["nombreuser4"])){
				$nombreUser4 = $_POST["nombreuser4"];
				$user4 = $this->userMapper->findByName($nombreUser4);
			}

			if(isset($_POST["nombreuser5"])){
				$nombreUser5 = $_POST["nombreuser5"];
				$user5 = $this->userMapper->findByName($nombreUser5);
			}


			try {
				$actividad->checkIsValidForCreate();

				$this->actividadMapper->save($actividad);

				$actividadF= $this->actividadMapper->findByName($actividad->getnombreactividad());

				if($nombreUser1!=null){
					$user = $user1;
					if($this->userMapper->exists($nombreUser1)){
						$this->actividadMapper->apuntarUsuarioActividad($usuarioF->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser2!=null){
					$user = $user2;
					if($this->userMapper->exists($nombreUser2)){
						$this->actividadMapper->apuntarUsuarioActividad($usuarioF->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser3!=null){
					$user = $user3;
					if($this->userMapper->exists($nombreUser3)){
						$this->actividadMapper->apuntarUsuarioActividad($usuarioF->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser4!=null){
					$user = $user4;
					if($this->userMapper->exists($nombreUser4)){
						$this->actividadMapper->apuntarUsuarioActividad($usuarioF->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser5!=null){
					$user = $user5;
					if($this->userMapper->exists($nombreUser5)){
						$this->actividadMapper->apuntarUsuarioActividad($usuarioF->getUsername(),$actividad->getidactividad());
					}
				}

				$this->view->setFlash(sprintf(i18n("Actividad \"%s\" añadido."),$actividad ->getnombreactividad()));


				$this->view->redirect("actividades", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("actividad", $actividad);

		$this->view->setVariable("user", $user);


		$this->view->render("actividades", "add");

	}


	public function edit() {

		if (!isset($_REQUEST["idactividad"])) {
			throw new Exception("A actividad idactividad is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing actividades requires login");
		}

		$user = new User();
		$actividadid = $_REQUEST["idactividad"];
		$actividad = $this->actividadMapper->findById($actividadid);
		$users = $this->actividadMapper->findUsuariosActividad($actividadid);

		if(isset($_POST["nombreuser1"])){
			$nombreUser1 = $_POST["nombreuser1"];
			$user1 = $this->userMapper->findByName($nombreUser1);
		}

		if(isset($_POST["nombreuser2"])){
			$nombreUser2 = $_POST["nombreuser2"];
			$user2 = $this->userMapper->findByName($nombreUser2);
		}

		if(isset($_POST["nombreuser3"])){
			$nombreUser3 = $_POST["nombreuser3"];
			$user3 = $this->userMapper->findByName($nombreUser3);
		}

		if(isset($_POST["nombreuser4"])){
			$nombreUser4 = $_POST["nombreuser4"];
			$user4 = $this->userMapper->findByName($nombreUser4);
		}

		if(isset($_POST["nombreuser5"])){
			$nombreUser5 = $_POST["nombreuser5"];
			$user5 = $this->userMapper->findByName($nombreUser5);
		}


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

				if($nombreUser1!=null){
					$user = $user1;
					if($this->userMapper->exists($nombreUser1)){
						$this->actividadMapper->apuntarUsuarioActividad($user->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser2!=null){
					$user = $user2;
					if($this->userMapper->exists($nombreUser2)){
						$this->actividadMapper->apuntarUsuarioActividad($user->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser3!=null){
					$user = $user3;
					if($this->userMapper->exists($nombreUser3)){
						$this->actividadMapper->apuntarUsuarioActividad($user->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser4!=null){
					$user = $user4;
					if($this->userMapper->exists($nombreUser4)){
						$this->actividadMapper->apuntarUsuarioActividad($user->getUsername(),$actividad->getidactividad());
					}
				}

				if($nombreUser5!=null){
					$user = $user5;
					if($this->userMapper->exists($nombreUser5)){
						$this->actividadMapper->apuntarUsuarioActividad($user->getUsername(),$actividad->getidactividad());
					}
				}



				$this->view->setFlash(sprintf(i18n("Actividad \"%s\" actualizado."),$actividad ->getnombreactividad()));


				$this->view->redirect("actividades", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}

		$this->view->setVariable("user", $user);
		$this->view->setVariable("users", $users);

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


		$actividadid = $_REQUEST["idactividad"];
		$actividad = $this->actividadMapper->findById($actividadid);


		if ($actividad == NULL) {
			throw new Exception("no such exercise with id: ".$actividadid);
		}


		$this->actividadMapper->deleteUsuariosFromActividad($actividad);

		$this->actividadMapper->delete($actividad);


		$this->view->setFlash(sprintf(i18n("Actividad \"%s\" eliminado."),$actividad ->getnombreactividad()));


		$this->view->redirect("actividades", "index");

	}

	public function deleteUsuario() {
		if (!isset($_GET["nombreusuario"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($_GET["idactividad"])) {
			throw new Exception("id is mandatory");
		}
		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing tablas requires login");
		}
		$actividadid = $_REQUEST["idactividad"];
		$actividad = $this->actividadMapper->findById($actividadid);

		$usuarionombre = $_REQUEST["nombreusuario"];
		$user = $this->userMapper->findByName($usuarionombre);


		if ($actividad == NULL) {
			throw new Exception("no such exercise with id: ".$actividadid);
		}



		$this->actividadMapper->deleteUsuarioFromActividad($user, $actividad);


		$this->view->setFlash(sprintf(i18n("Usuario eliminado.")));


		$this->view->redirect("actividades", "index");

	}
}


	?>
