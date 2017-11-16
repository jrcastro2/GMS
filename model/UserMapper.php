<?php
require_once(__DIR__."/../core/PDOConnection.php");


class UserMapper {


	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}


	public function save($user) {
		$stmt = $this->db->prepare("INSERT INTO usuario values (?,?,?,?)");
		$stmt->execute(array($user->getUsername(), $user->getPasswd(), $user->getMail(), $user->getType()));
	}


	public function usernameExists($username) {
		$stmt = $this->db->prepare("SELECT count(nombreusuario) FROM usuario where nombreusuario=?");
		$stmt->execute(array($username));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}


	public function isValidUser($username, $passwd) {
		$stmt = $this->db->prepare("SELECT count(nombreusuario) FROM usuario where nombreusuario=? and contraseña=?");
		$stmt->execute(array($username, $passwd));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}
}
