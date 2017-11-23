
<?php

require_once(__DIR__."/../core/ValidationException.php");

class Actividad {

    private $idactividad;
    private $nombreactividad;
    private $descripcionactividad;
    private $dia;
    private $hora;
    private $capacidad;
	

    public function __construct($idactividad="" , $nombreactividad="", $descripcionactividad="" , $dia="" , $hora="",
		$capacidad="") {

		$this->idactividad = $idactividad;
        $this->nombreactividad = $nombreactividad;
        $this->descripcionactividad = $descripcionactividad;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->capacidad = $capacidad;

    }

		/*-------------------------- GET DE CADA ATRIBUTO ----------------------------------------*/


		/* FALTAN LOS GETTERS DE LOS IDS*/
	public function getidactividad (){
       
        return $this->idactividad;
    }

	public function getnombreactividad (){
      
        return $this ->nombreactividad;
    }
	
	public function setnombreactividad ($nombreactividad){
      
        $this ->nombreactividad= $nombreactividad;
    }

    public function getdescripcionactividad (){
       

        return $this ->descripcionactividad;
    }
	
	public function setdescripcionactividad ($descripcionactividad){
       
		$this ->descripcionactividad= $descripcionactividad;
    }

	public function getdia (){
      
        return $this ->dia;
    }
	public function setdia ($dia){
      
        $this ->dia= $dia;
    }

    public function gethora (){
       
        return $this ->hora;
    }
	 public function sethora ($hora){
       
        $this ->hora= $hora;
    }

    public function getcapacidad (){

        return $this ->capacidad;
    }
	
	public function setcapacidad ($capacidad){

        $this ->capacidad=$capacidad;
    }
	
	public function checkIsValidForCreate() {
		$errors = array();
		if (strlen(trim($this->nombreactividad)) == 0 ) {
			$errors["nombreactividad"] = "nombreactividad is mandatory";
		}
		if (strlen(trim($this->descripcionactividad)) == 0 ) {
			$errors["descipcionactividad"] = "descripcionactividad is mandatory";
		}

		if (sizeof($errors) > 0){
			throw new ValidationException($errors, " actividad no es valida");
		}
	}
	
	public function checkIsValidForUpdate() {
		$errors = array();

		if (!isset($this->idactividad)) {
			$errors["idactividad"] = "idactividad is mandatory";
		}

		try{
			$this->checkIsValidForCreate();
		}catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key=>$error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "actividad no es valida");
		}
	}

		
}

?>
