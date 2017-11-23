<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/User.php");

class UserMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function findAll() {
			$stmt = $this->db->query("SELECT * FROM usuario");
			$users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$users = array();

			foreach ($users_db as $user) {
				array_push($users, new User($user["nombreusuario"],$user["contraseña"], $user["correo"], $user["tipousuario"]));
			}

			return $users;
		}

		public function findByName($nombreusuario){
		$stmt = $this->db->prepare("SELECT * FROM usuario WHERE nombreusuario=?");
		$stmt->execute(array($nombreusuario));
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if($user != null) {
			return new User(
			$user["nombreusuario"],
			$user["contraseña"],
			$user["correo"],
			$user["tipousuario"]);
		} else {
			return NULL;
		}
	}


	public function save(User $user) {
		$stmt = $this->db->prepare("INSERT INTO usuario (nombreusuario, contraseña, correo, tipousuario) values (?,?,?,?)");
		$stmt->execute(array($user->getUsername(), $user->getPassword(), $user->getMail(), $user->getUserType()));
		//return $this->db->lastInsertId();
	}

	public function update(User $user) {
				$stmt = $this->db->prepare("UPDATE usuario set contraseña=?, correo=?, tipousuario=? where nombreusuario=?");
				$stmt->execute(array($user->getPassword(),$user->getMail(),$user->getUserType(), $user->getUsername()));
			}

	public function delete(User $user) {
			$stmt = $this->db->prepare("DELETE from usuario WHERE nombreusuario=?");
			$stmt->execute(array($user->getUsername()));
		}

	public function usernameExists($nombreusuario) {
		$stmt = $this->db->prepare("SELECT count(nombreusuario) FROM usuario where nombreusuario=?");
		$stmt->execute(array($nombreusuario));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	public function isValidUser($nombreusuario, $contraseña) {
		$stmt = $this->db->prepare("SELECT count(nombreusuario) FROM usuario where nombreusuario=? and contraseña=?");
		$stmt->execute(array($nombreusuario, $contraseña));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	public function esAdmin($nombreusuario) {
		$tipo="admin";
		$stmt = $this->db->prepare("SELECT count(nombreusuario) FROM usuario where nombreusuario=? and tipousuario=?");
		$stmt->execute(array($nombreusuario, $tipo));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}else{
			return false;
		}
	}
	
	public function exists($usuarioname){
		$stmt = $this->db->prepare("SELECT * FROM usuario WHERE nombreusuario=?");
		$stmt->execute(array($usuarioname));
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if($user != null) {
			return true;
		} else {
			return false;
		}
	}


}
