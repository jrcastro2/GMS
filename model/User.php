<?php

require_once(__DIR__."/../core/ValidationException.php");


class User {


	private $nombreusuario;

	private $contraseña;

	private $correo;

	private $tipousuario;



	public function __construct($nombreusuario=NULL, $contraseña=NULL, $correo=NULL, $tipousuario=NULL) {
		$this->nombreusuario = $nombreusuario;
		$this->contraseña = $contraseña;
		$this->correo = $correo;
		$this->tipousuario = $tipousuario;
	}


	public function getUsername() {
		return $this->nombreusuario;
	}

	public function getPassword() {
		return $this->contraseña;
	}

	public function getMail() {
		return $this->correo;
	}

	public function getUserType() {
		return $this->tipousuario;
	}

	public function setUsername($nombreusuario) {
		$this->nombreusuario = $nombreusuario;
	}

	public function setPassword($contraseña) {
		$this->contraseña = $contraseña;
	}

	public function setMail($correo) {
		$this->correo = $correo;
	}

	public function setUserType($tipousuario) {
		$this->tipousuario = $tipousuario;
	}


	public function checkIsValidForRegister() {
		$errors = array();
		if (strlen($this->nombreusuario) < 5) {
			$errors["nombreusuario"] = "username is not valid";

		}
		if (strlen($this->contraseña) < 5) {
			$errors["contraseña"] = "password is not valid";
		}
		if (strlen($this->correo) <3) {
			$errors["correo"] = "email is not valid";
		}
		if (sizeof($errors)>0){
			throw new ValidationException($errors, "User is not valid");
		}
	}

	public function checkIsValidForUpdate() {
		$errors = array();

		if (!isset($this->nombreusuario)) {
			$errors["nombreusuario"] = "username is not valid";
		}

		try{
			$this->checkIsValidForRegister();
		}catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key=>$error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "username is not valid");
		}
	}

}
