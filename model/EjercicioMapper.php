<?php
// file: model/ExerciseMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Ejercicio.php");


class EjercicioMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function findAll() {
		$stmt = $this->db->query("SELECT * FROM ejercicio");
		$ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$ejercicios = array();

		foreach ($ejercicios_db as $ejercicio) {
			array_push($ejercicios, new Ejercicio($ejercicio["idejercicio"],$ejercicio["nombreejercicio"], $ejercicio["descripcionejercicio"], $ejercicio["numerorepeticiones"], $ejercicio["numeroseries"]));
		}

		return $ejercicios;
	}


	public function findById($ejercicioid){
		$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idejercicio=?");
		$stmt->execute(array($ejercicioid));
		$ejercicio = $stmt->fetch(PDO::FETCH_ASSOC);

		if($ejercicio != null) {
			return new Ejercicio(
			$ejercicio["idejercicio"],
			$ejercicio["nombreejercicio"],
			$ejercicio["descripcionejercicio"],
			$ejercicio["numerorepeticiones"],
			$ejercicio["numeroseries"]);
		} else {
			return NULL;
		}
	}

	public function findByName($ejercicioName){
		$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE nombreejercicio=?");
		$stmt->execute(array($ejercicioName));
		$ejercicio = $stmt->fetch(PDO::FETCH_ASSOC);

		if($ejercicio != null) {
			return new Ejercicio(
			$ejercicio["idejercicio"],
			$ejercicio["nombreejercicio"],
			$ejercicio["descripcionejercicio"],
			$ejercicio["numerorepeticiones"],
			$ejercicio["numeroseries"]);
		} else {
			return NULL;
		}
	}

	public function exists($ejercicioname){
		$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE nombreejercicio=?");
		$stmt->execute(array($ejercicioname));
		$ejer = $stmt->fetch(PDO::FETCH_ASSOC);

		if($ejer != null) {
			return true;
		} else {
			return false;
		}
	}





		public function save(Ejercicio $ejercicio) {
			$stmt = $this->db->prepare("INSERT INTO ejercicio(nombreejercicio, descripcionejercicio, numerorepeticiones, numeroseries) values (?,?,?,?)");
			$stmt->execute(array($ejercicio->getTitle(), $ejercicio->getContent(), $ejercicio->getRepeticiones(),$ejercicio->getSeries()));
			return $this->db->lastInsertId();
		}


		public function update(Ejercicio $ejercicio) {
			$stmt = $this->db->prepare("UPDATE ejercicio set nombreejercicio=?, descripcionejercicio=?, numerorepeticiones=?, numeroseries=? where idejercicio=?");
			$stmt->execute(array($ejercicio->getTitle(), $ejercicio->getContent(),$ejercicio->getRepeticiones(),$ejercicio->getSeries(), $ejercicio->getId()));
		}

		public function delete(Ejercicio $ejercicio) {
			$stmt = $this->db->prepare("DELETE from ejercicio WHERE idejercicio=?");
			$stmt->execute(array($ejercicio->getId()));
		}

	}
