<?php

require_once "conexionBD.php";


class EmpleadosM extends ConexionBD{
     
     //Registrar empleados

     static public function RegistrarEmpleadosM($datosC, $tablaBD){
     	$pdo = ConexionBD::cBD()->prepare("INSERT Into $tablaBD(nombre, apellido, email, puesto, salario)VALUES(:nombre, :apellido, :email, :puesto, :salario)");

     	$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

     	$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

     	$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);

     	$pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);

     	$pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

     	//para que se ejecute PDO
     	//PHP Data Objects es una extensión que provee una capa de abstracción de acceso a datos para PHP 5, con lo cual se consigue hacer uso de las mismas funciones para hacer consultas y obtener datos de distintos manejadores de bases de datos. 

     	if ($pdo -> execute()) {
     		return "Bien";
     	}else{
     		return "Error";
     	}

     	$pdo -> close();
    }

    //Mostrar empleados
    
    static public function MostrarEmpleados($tablaBD){

    	$pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");
    	$pdo -> execute();
    	return $pdo -> fetchAll(); //en el ingreso del adm se hace un solo fetch porque era solo una fila en cambio en el lado del usuario devolvera una fila o todas las que haya

    	$pdo -> close();

    }

    //Editar empleado

    static public function EditarEmpleado($datosC, $tablaBS){
      
       $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE id=:id");

       $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
       
       $pdo ->execute();


       //Actualizar empleados
       Static public function ActualizarEmpleadoM($datosC, $tablaBD){

       	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, apellido = :apellido, email = :email, puesto = :puesto, salario = :salario WHERE id = :id");

       	$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
       	$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
       	$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
       	$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
       	$pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
       	$pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);
       }

       if($pdo -> execute()) {
     		return "Bien";
     	}else{
     		return "Error";
     	}

     	$pdo -> close();
    }

    //Borrar empleado
    static public function BorrarEmpleadoM($datosC, $tablaBD){

    	$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

    	$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
    	if($pdo -> execute()) {
     		return "Bien";
     	}else{
     		return "Error";
     	}

     	$pdo -> close();
    }

    }
    
}
