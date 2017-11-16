<?php

require_once(__DIR__."/../core/ValidationException.php");


class Ejercicio {


	private $id;

	private $title;


	private $content;

	private $repeticiones;

	private $series;


	public function __construct($id=NULL, $title=NULL, $content=NULL, $repeticiones=NULL, $series=NULL) {
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->repeticiones = $repeticiones;
		$this->series = $series;

	}


	public function getId() {
		return $this->id;
	}


	public function getTitle() {
		return $this->title;
	}


	public function setTitle($title) {
		$this->title = $title;
	}


	public function getContent() {
		return $this->content;
	}


	public function setContent($content) {
		$this->content = $content;
	}


	public function getRepeticiones() {
		return $this->repeticiones;
	}


	public function setRepeticiones($repeticiones) {
		$this->repeticiones = $repeticiones;
	}


	public function getSeries() {
		return $this->series;
	}

	public function setSeries($series) {
		$this->series = $series;
	}


	public function checkIsValidForCreate() {
		$errors = array();
		if (strlen(trim($this->title)) == 0 ) {
			$errors["title"] = "title is mandatory";
		}
		if (strlen(trim($this->content)) == 0 ) {
			$errors["content"] = "content is mandatory";
		}

		if (sizeof($errors) > 0){
			throw new ValidationException($errors, "exercise is not valid");
		}
	}


	public function checkIsValidForUpdate() {
		$errors = array();

		if (!isset($this->id)) {
			$errors["idejercicio"] = "id is mandatory";
		}

		try{
			$this->checkIsValidForCreate();
		}catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key=>$error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "exercise is not valid");
		}
	}
}
