<?php

class Modelo{ //sera una clase static porque llevara parametros
   static public function RutasModelo($rutas){
   	if($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" ||$rutas == "editar" || $rutas == "salir")

   		$pagina = "Vistas/modulos/".$rutas.".php";
   }else if($rutas == "index"){
   	$pagina = "Vista/modulos/ingreso.php";
   }else{
   	$pagina = "Vista/modulos/ingreso.php";
   }

   return $pagina;


}