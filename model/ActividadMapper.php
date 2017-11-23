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
			$actividad["descripcionactividad"]);
		} else {
			return NULL;
		}
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

	}
