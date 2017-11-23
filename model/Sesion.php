<?php


require_once(__DIR__."/../core/ValidationException.php");

	class Sesion
	{
		public $idsesion;
		public $fechasesion;
		public $duracionsesion;
		public $comentario;
		public $Usuario_idusuario;

		public function __construct($idsesion=NULL, $fechasesion=NULL, $duracionsesion=NULL, $comentario=NULL, $Usuario_idusuario=NULL) {
		$this->idsesion= $idsesion;
		$this->fechasesion = $fechasesion;
		$this->duracionsesion = $duracionsesion;
		$this->comentario = $comentario;
		$this->Usuario_idusuario= $Usuario_idusuario;

		}

		/*public function mostrarFecha(){
			echo $this->fecha;
		}
		public function mostrarListaEjercicios(){
			print_r ($this->listaEjercicios);
		}
		public function mostrarUsuario(){
			echo $this->usuario;
		}*/

		/*public function mostrarComentarios(){
			print_r ($this->comentario);
		}*/
		public function getIdSesion(){
			return $this->idsesion;

		}
		public function getFechaSesion(){
			return $this->fechasesion;
		}
		public function getDuracionSesion(){
			return $this->duracionsesion;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function getUsuario_idusuario(){
			return $this->Usuario_idusuario;
		}
		public function setIdSesion($idsesion){
			$this->idsesion=$idsesion;
		}
		public function setFechaSesion($fechasesion){
			$this->fechasesion=$fechasesion;
		}
		public function setDuracionSesion($duracionsesion){
			$this->duracionsesion=$duracionsesion;
		}
		public function setComentario($comentario){
			$this->comentario=$comentario;
		}
		public function setUsuario_idusuario($Usuario_idusuario){
			$this->Usuario_idusuario=$Usuario_idusuario;
		}
		public function checkIsValidForCreate() {
			$errors = array();
			if ($this->idsesion== NULL ) {
				$errors["fecha"] = "la id de sesion es obligatoria";
			}
			if ($this->Usuario_idusuario == NULL ) {
				$errors["usuario"] = "el usuario es obligatorio";
			}
			if (sizeof($errors) > 0){
				throw new ValidationException($errors, "falta algún campo obligatorio por rellenar");
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
	/*$A->mostrarFecha();
	$A->setFecha('jose');
	$A->mostrarFecha();
	$array=array(
		"Biceps","Cuadriceps","Plancha","Curl","Press de Banca");
	$A->setListaEjercicios($array);
	$A->mostrarListaEjercicios();
	$array2=array("Me gusta tu evolución","Vas bien", "Necesitas mejorar las repeticiones");
	$A->setComentarios($array2);
	$A->mostrarComentarios();
	//echo($A->getFecha());

	function addComentario(SesionEntrenamiento $B, $coment){
		array_push($B->comentarios,$coment);
	}

	function deleteComentario(SesionEntrenamiento $B, $posicion){
	    unset($B->comentarios[$posicion]);
	}

	function addEjercicio(SesionEntrenamiento $B, $ejercicio){
		array_push($B->listaEjercicios,$ejercicio);
	}

	function deleteEjercicio(SesionEntrenamiento $B, $posicion){
	    unset($B->listaEjercicios[$posicion]);
	}

	function modifyEjercicio(SesionEntrenamiento $B, $posicion, $modificacion){
	    $B->listaEjercicios[$posicion]=$modificacion;
	}
		addComentario($A, "Sigue así");
	$A->mostrarComentarios();
	deleteComentario($A, 2);
	$A->mostrarComentarios();
	addEjercicio($A,"Flexiones");
	$A->mostrarListaEjercicios();
	modifyEjercicio($A,0,"Sentadillas");
	$A->mostrarListaEjercicios();*/


?>

 
