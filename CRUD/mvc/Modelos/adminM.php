<?php

require_once "conexionBD.php";

class Admin extendes ConexionBD{
	static public function IngresoM($datosC, $tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);//enlaza parametros

		$pdo ->execute();

		return $pdo ->fetch();

		$pdo ->close();


	}
}