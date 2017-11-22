<?php
// file: model/ExerciseMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Tabla.php");
require_once(__DIR__."/../model/Ejercicio.php");


class TablaMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function findAll() {
		$stmt = $this->db->query("SELECT * FROM tablaejercicios");
		$tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$tablas = array();

		foreach ($tablas_db as $tabla) {
			array_push($tablas, new Tabla($tabla["idtabla"],$tabla["nombretabla"]));
		}

		return $tablas;
	}


	public function findById($tablaid){
		$stmt = $this->db->prepare("SELECT * FROM tablaejercicios WHERE idtabla=?");
		$stmt->execute(array($tablaid));
		$tabla = $stmt->fetch(PDO::FETCH_ASSOC);

		if($tabla != null) {
			return new Tabla(
			$tabla["idtabla"],
			$tabla["nombretabla"]);
		} else {
			return NULL;
		}
	}

	public function findByName($tablaName){
		$stmt = $this->db->prepare("SELECT * FROM tablaejercicios WHERE nombretabla=?");
		$stmt->execute(array($tablaName));
		$tabla = $stmt->fetch(PDO::FETCH_ASSOC);

		if($tabla != null) {
			return new Tabla(
			$tabla["idtabla"],
			$tabla["nombretabla"]);
		} else {
			return NULL;
		}
	}


	public function asignarEjercicioTabla($tablaid,$ejercicioid){
		$stmt = $this->db->prepare("INSERT INTO ejercicio_pertenece_tablaejercicios(Ejercicio_idejercicio, TablaEjercicios_idtabla) values (?,?)");
		$stmt->execute(array($ejercicioid,$tablaid));
	}

	public function findEjerciciosTabla($idTabla){
		$stmt = $this->db->prepare("SELECT Ejercicio_idejercicio FROM ejercicio_pertenece_tablaejercicios WHERE TablaEjercicios_idtabla=?");
		$stmt->execute(array($idTabla));
		$idejercicios = $stmt->fetchAll(PDO::FETCH_ASSOC);


		$ejercicios_array = array();
		if(sizeof($idejercicios) > 0){
			foreach ($idejercicios as $ejercicioid) {

				$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idejercicio=?");
				$stmt->execute(array($idejercicios[0]["Ejercicio_idejercicio"]));
				$ejercicio = $stmt->fetch(PDO::FETCH_ASSOC);

				if($ejercicio != null) {
					$ejercicio = new Ejercicio(
					$ejercicio["idejercicio"],
					$ejercicio["nombreejercicio"],
					$ejercicio["descripcionejercicio"],
					$ejercicio["numerorepeticiones"],
					$ejercicio["numeroseries"]);

					array_push($ejercicios_array, $ejercicio);
				}
					array_splice($idejercicios , 0 ,1);
			}
		}

		return $ejercicios_array;

	}

	public function ejercicioAsignado($tabla,$ejercicio){
		$stmt = $this->db->prepare("SELECT * FROM ejercicio_pertenece_tablaejercicios WHERE TablaEjercicios_idtabla=? AND Ejercicio_idejercicio=?");
		$stmt->execute(array($tabla->getId(),$ejercicio->getId()));
		$yaExiste = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if($yaExiste != null) {
			return true;
		} else {
			return false;
		}

	}


	/*public function findEjerciciosTabla($idTabla){
		$stmt = $this->db->prepare("SELECT Ejercicio_idejercicio FROM ejercicio_pertenece_tablaejercicios WHERE TablaEjercicios_idtabla=?");
		$stmt->execute(array($idTabla));
		$idejercicios = $stmt->fetchAll(PDO::FETCH_ASSOC);


		$ejercicios_array = array();
		if(sizeof($idejercicios) > 0){
			foreach ($idejercicios as $ejercicioid) {

				$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idejercicio=?");
				$stmt->execute(array($idejercicios[0]["Ejercicio_idejercicio"]));
				$ejercicio = $stmt->fetch(PDO::FETCH_ASSOC);

				if($ejercicio != null) {
					$ejercicio = new Ejercicio(
					$ejercicio["idejercicio"],
					$ejercicio["nombreejercicio"],
					$ejercicio["descripcionejercicio"],
					$ejercicio["numerorepeticiones"],
					$ejercicio["numeroseries"]);

					array_push($ejercicios_array, $ejercicio);
				}
			}
		}

		return $ejercicios_array;

}*/



		public function save(Tabla $tabla) {
			$stmt = $this->db->prepare("INSERT INTO tablaejercicios(nombretabla) values (?)");
			$stmt->execute(array($tabla->getNombre()));
			return $this->db->lastInsertId();
		}


		public function update(Tabla $tabla) {
			$stmt = $this->db->prepare("UPDATE tablaejercicios set nombretabla=? where idtabla=?");
			$stmt->execute(array($tabla->getNombre(), $tabla->getId()));
		}

		public function delete(Tabla $tabla) {
			$stmt = $this->db->prepare("DELETE from tablaejercicios WHERE idtabla=?");
			$stmt->execute(array($tabla->getId()));
		}

		public function deleteEjerciciosFromTabla(Tabla $tabla) {
			$stmt = $this->db->prepare("DELETE from ejercicio_pertenece_tablaejercicios WHERE TablaEjercicios_idtabla=?");
			$stmt->execute(array($tabla->getId()));
		}

		public function deleteEjercicioFromTabla(Ejercicio $ejercicio, Tabla $tabla) {
			$stmt = $this->db->prepare("DELETE from ejercicio_pertenece_tablaejercicios WHERE Ejercicio_idejercicio=? AND TablaEjercicios_idtabla=?");
			$stmt->execute(array($ejercicio->getId(),$tabla->getId()));
		}

	}
