<?php 

class RutasControlador{
	public function Plantilla(){
		include "Vistas/plantilla.php";
	}

	public function Rutas(){

		if (isset($_GET["ruta"])) { //si la variable get ruta viene con informacion entonces que la variable ruta sea igual a la variable getruta
			$rutas = $_GET["ruta"];
		}else{
			$rutas = "index";
		}

		$respuesta = Modelo::RutasModelo($rutas);//:: para conexion con el modelo
	    include $respuesta; 
	}
}