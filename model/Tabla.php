<?php

require_once(__DIR__."/../core/ValidationException.php");


class Tabla {


	private $id;

	private $nombre;

	public function __construct($id=NULL, $nombre=NULL) {
		$this->id = $id;
		$this->nombre = $nombre;

	}

	public function getId() {
		return $this->id;
	}


	public function getNombre() {
		return $this->nombre;
	}


	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}




	public function checkIsValidForCreate() {
		$errors = array();
		if (strlen(trim($this->nombre)) == 0 ) {
			$errors["nombre"] = "nombre es obligatorio";
		}


		if (sizeof($errors) > 0){
			throw new ValidationException($errors, "tabla no es valida");
		}
	}


	public function checkIsValidForUpdate() {
		$errors = array();

		if (!isset($this->id)) {
			$errors["idtabla"] = "id es obligatorio";
		}

		try{
			$this->checkIsValidForCreate();
		}catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key=>$error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "tabla no es valida");
		}
	}
}
