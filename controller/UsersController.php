<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../controller/BaseController.php");


class UsersController extends BaseController {


	private $userMapper;

	public function __construct() {
		parent::__construct();

		$this->userMapper = new UserMapper();

	}

	public function index() {
		if (!$this->userMapper->esAdmin($this->currentUser->getUsername())) {
			throw new Exception("No eres Admin");
		}

		$user = $this->userMapper->findAll();

		$this->view->setVariable("users", $user);

		$this->view->render("users", "index");
	}


	public function view(){
		if (!isset($_GET["nombreusuario"])) {
			throw new Exception("id is mandatory");
		}

		$nombreusuario = $_GET["nombreusuario"];

		$user = $this->userMapper->findByName($nombreusuario);

		if ($user == NULL) {
			throw new Exception("no such user with name: ".$nombreusuario);
		}

		$this->view->setVariable("user", $user);

		$this->view->render("users", "view");

	}

//LOGIN
	public function login() {
		if (isset($_POST["nombreusuario"])){
			if ($this->userMapper->isValidUser($_POST["nombreusuario"],$_POST["contraseña"])) {

				$_SESSION["currentuser"]=$_POST["nombreusuario"];

				$this->view->redirect("users", "index");

			}else{
				$errors = array();
				$errors["general"] = "Nombre de usuario no válido";
				$this->view->setVariable("errors", $errors);
			}
		}

		$this->view->render("users", "login");
	}

//REGISTRO
	public function register() {

		$user = new User();

		if (isset($_POST["submit"])){

			$user->setUsername($_POST["nombreusuario"]);
			$user->setPassword($_POST["contraseña"]);
			$user->setMail($_POST["correo"]);
			$user->setUserType($_POST["tipousuario"]);

			try{
				$user->checkIsValidForRegister();


					if (!$this->userMapper->usernameExists($_POST["nombreusuario"])){

					$this->userMapper->save($user);


					$this->view->setFlash(sprintf(i18n("usuario\"%s\" añadido"),$user->getUsername()));


					$this->view->redirect("users", "login");
				} else {
					$errors = array();
					$errors["nombreusuario"] = "El nombre de usuario ya existe";
					$this->view->setVariable("errors", $errors);
				}
			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("user", $user);

		$this->view->render("users", "register");

	}
	public function logout() {
		session_destroy();


		$this->view->redirect("users", "login");

	}

	public function perfil() {


		if (isset($_POST["submit"])) {

			$user->setPassword($_POST["contraseña"]);
			$user->setMail($_POST["correo"]);
			$user->setUserType($_POST["tipousuario"]);


			try {

				$user->checkIsValidForUpdate();


				$this->userMapper->update($user);


				$this->view->redirect("users", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("user", $user);

		$this->view->render("users", "perfil");


		}



	public function edit() {
		if (!isset($_REQUEST["nombreusuario"])) {
			throw new Exception("A username is mandatory");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing users requires login");
		}

		$nombreusuario = $_REQUEST["nombreusuario"];
		$user = $this->userMapper->findByName($nombreusuario);

		if ($user == NULL) {
			throw new Exception("no such exercise with username: ".$nombreusuario);
		}


		if (isset($_POST["submit"])) {

			$user->setUsername($_POST["nombreusuario"]);
			$user->setPassword($_POST["contraseña"]);
			$user->setMail($_POST["correo"]);
			$user->setUserType($_POST["tipousuario"]);


			try {

				$user->checkIsValidForUpdate();


				$this->userMapper->update($user);


				$this->view->setFlash(sprintf(i18n("Usuario \"%s\" actualizado."),$user ->getUsername()));


				$this->view->redirect("users", "index");

			}catch(ValidationException $ex) {

				$errors = $ex->getErrors();

				$this->view->setVariable("errors", $errors);
			}
		}


		$this->view->setVariable("user", $user);

		$this->view->render("users", "edit");


	}


	public function delete() {
		if (!isset($_POST["nombreusuario"])) {
			throw new Exception("El nombre de usuario es obligatorio");
		}

		if (!isset($this->currentUser)) {
			throw new Exception("Not in session. Editing tablas requires login");
		}

		$nombreusuario = $_REQUEST["nombreusuario"];
		$user = $this->userMapper->findByName($nombreusuario);

		if ($user == NULL) {
			throw new Exception("No se encuentra el nombre de usuario: ".$nombreusuario);
		}




		$this->userMapper->delete($user);


		$this->view->setFlash(sprintf(i18n("Usuario \"%s\" eliminado."),$user ->getUsername()));


		$this->view->redirect("users", "index");

	}
}
