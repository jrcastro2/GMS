<?php
// file: model/ExerciseMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Actividad.php");


class ActividadMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function findAll() {
		$stmt = $this->db->query("SELECT * FROM actividad");
		$actividad_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$actividades = array();

		foreach ($actividad_db as $actividad) {
			array_push($actividades, new Actividad($actividad["idactividad"],$actividad["nombreactividad"], $actividad["descripcionactividad"], $actividad["dia"],$actividad["hora"], $actividad["capacidad"]));
		}

		return $actividades;
	}


	public function findById($actividadid){
		$stmt = $this->db->prepare("SELECT * FROM actividad WHERE idactividad=?");
		$stmt->execute(array($actividadid));
		$actividad = $stmt->fetch(PDO::FETCH_ASSOC);

		if($actividad != null) {
			return new Actividad(
			$actividad["idactividad"],
			$actividad["nombreactividad"],
			$actividad["descripcionactividad"],
			$actividad["dia"],
			$actividad["hora"],
			$actividad["capacidad"]
			);
		} else {
			return NULL;
		}
	}
	
	
	public function findByName($actividadName){
		$stmt = $this->db->prepare("SELECT * FROM actividad WHERE nombreactividad=?");
		$stmt->execute(array($actividadName));
		$actividad = $stmt->fetch(PDO::FETCH_ASSOC);

		if($actividad != null) {
			return new Actividad(
			$actividad["idactividad"],
			$actividad["nombreactividad"]);
		} else {
			return NULL;
		}
	}
	
	
	
	public function apuntarUsuarioActividad($nombreusuario,$actividadid){
		$stmt = $this->db->prepare("INSERT INTO Usuario_apunta_Actividades(Usuario_nombreusuario, Actividad_idactividad) values (?,?)");
		$stmt->execute(array($nombreusuario,$actividadid));
	}

	public function findUsuariosActividad($idActividad){
		$stmt = $this->db->prepare("SELECT Usuario_nombreusuario FROM Usuario_apunta_Actividades WHERE Actividad_idactividad=?");
		$stmt->execute(array($idActividad));
		$nombreusuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


		$usuarios_array = array();
		if(sizeof($nombreusuarios) > 0){
			foreach ($nombreusuarios as $usuarionombre) {

				$stmt = $this->db->prepare("SELECT * FROM usuario WHERE nombreusuario=?");
				$stmt->execute(array($nombreusuarios[0]["Usuario_nombreusuario"]));
				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				if($user != null) {
					$user = new User(
					$user["nombreusuario"],
					$user["contraseña"],
					$user["correo"],
					$user["tipousuario"]);

					array_push($usuarios_array, $user);
				}
					array_splice($nombreusuarios , 0 ,1);
			}
		}

		return $usuarios_array;

	}





		public function save(Actividad $actividad) {
			$stmt = $this->db->prepare("INSERT INTO actividad(nombreactividad, descripcionactividad, dia, hora, capacidad) values (?,?,?,?,?)");
			$stmt->execute(array($actividad->getnombreactividad(), $actividad->getdescripcionactividad(), $actividad->getdia(), $actividad-> gethora(), $actividad->getcapacidad()));
			return $this->db->lastInsertId();
		}


		public function update(Actividad $actividad) {
			$stmt = $this->db->prepare("UPDATE actividad set nombreactividad=?, descripcionactividad=?, dia=?, hora=?, capacidad=? where idactividad=?");
			$stmt->execute(array($actividad->getnombreactividad(), $actividad->getdescripcionactividad(), $actividad->getdia(), $actividad-> gethora(), $actividad->getcapacidad(), $actividad->getidactividad()));
		}

		public function delete(Actividad $actividad) {
			$stmt = $this->db->prepare("DELETE from actividad WHERE idactividad=?");
			$stmt->execute(array($actividad->getIdactividad()));
		}
		
		public function deleteUsuariosFromActividad(Actividad $actividad) {
			$stmt = $this->db->prepare("DELETE from Usuario_apunta_Actividades WHERE Actividad_idactividad=?");
			$stmt->execute(array($actividad->getId()));
		}

		public function deleteUsuarioFromActividad(User $usuario, Actividad $actividad) {
			$stmt = $this->db->prepare("DELETE from Usuario_apunta_Actividades WHERE Usuario_nombreusuario=? AND Actividad_idactividad=?");
			$stmt->execute(array($usuario->getUsername(),$actividad->getidactividad()));
		}

	}
