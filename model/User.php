<?php

require_once(__DIR__."/../core/ValidationException.php");


class User {


	private $username;


	private $passwd;

	private $mail;

	private $type;





	public function __construct($username=NULL, $passwd=NULL, $mail=NULL, $type=NULL) {
		$this->username = $username;
		$this->passwd = $passwd;
		$this->mail = $mail;
		$this->type = $type;
	}


	public function getUsername() {
		return $this->username;
	}


	public function setUsername($username) {
		$this->username = $username;
	}


	public function getPasswd() {
		return $this->passwd;
	}

	public function setPassword($passwd) {
		$this->passwd = $passwd;
	}

	public function getMail() {
		return $this->mail;
	}

	public function setMail($mail) {
		$this->mail = $mail;
	}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

	
	public function checkIsValidForRegister() {
		$errors = array();
		if (strlen($this->username) < 5) {
			$errors["nombreusuario"] = "Username must be at least 5 characters length";

		}
		if (strlen($this->passwd) < 5) {
			$errors["contraseña"] = "Password must be at least 5 characters length";
		}
		if (sizeof($errors)>0){
			throw new ValidationException($errors, "user is not valid");
		}
	}
}
