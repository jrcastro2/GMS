

<?php
// file: model/SesionEntrenamientoMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/Sesion.php");


class SesionMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function findAll() {
		$stmt = $this->db->query("SELECT * FROM sesion");
		$sesiones_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$sesiones = array();

		foreach ($sesiones_db as $sesion) {
			array_push($sesiones, new Sesion($sesion["idsesion"],$sesion["fechasesion"], $sesion["duracionsesion"], $sesion["comentario"], $sesion["Usuario_nombreusuario"]));
		}

		return $sesiones;
	}


	public function findById($sesionid){
		$stmt = $this->db->prepare("SELECT * FROM sesion WHERE idsesion=?");
		$stmt->execute(array($sesionid));
		$sesion = $stmt->fetch(PDO::FETCH_ASSOC);

		if($sesion != null) {
			return new Sesion(
			$sesion["idsesion"],
			$sesion["fechasesion"],
			$sesion["duracionsesion"],
			$sesion["comentario"],
			$sesion["Usuario_idusuario"]);
		} else {
			return NULL;
		}
	}




		public function save(Sesion $sesion) {
			$stmt = $this->db->prepare("INSERT INTO sesion(idsesion,fechasesion,duracionsesion,comentario,Usuario_idusuario) values (?,?,?,?)");
			$stmt->execute(array($sesion->getIdSesion,$sesion->getFechaSesion(),$sesion->getDuracionSesion,$sesion->getComentario,$sesion->getUsuario_idusuario()));
			return $this->db->lastInsertId();
		}


		public function update(Sesion $sesion) {
			$stmt = $this->db->prepare("UPDATE sesion set idsesion=?, fechasesion=?,duracionsesion=?,comentario=?,Usuario_idusuario=? where idsesion=?");
			$stmt->execute(array($sesion->getIdSesion,$sesion->getFechaSesion(),$sesion->getDuracionSesion,$sesion->getComentario,$sesion->getUsuario_idusuario()));
		}

		public function delete(Sesion $sesion) {
			$stmt = $this->db->prepare("DELETE from sesion WHERE idsesion=?");
			$stmt->execute(array($sesion->getIdSesion()));
		}

	}
