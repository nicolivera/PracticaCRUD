<?php

class AdminC{
	public function ingresoC(){
		if (isset$_POST["usuarioI"]) {
			$datosC = array("usuario"->$_POST["usuarioI"], "clave"->$_POST["claveI"]);

			$tablaBD = "administradores";

			$respuesta = AdminM::IngresoM($datosC, $tablaBD);

			if ($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]) {
				//variable de sesion

				session_start();

				$_SESSION["Ingreso"] = true;
				header("location:index.php?ruta=empleados");
			}else{
				echo "ERROR AL INGRESAR";
			}
		}
	}
}