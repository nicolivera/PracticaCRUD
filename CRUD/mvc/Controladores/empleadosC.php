<?php

class EmpleadosC{

    //Registrar los empleados

	public function RegistrarEmpleadosC(){
		if (isset($_POST["nombreR"])) {

			$datosC = array("nombre" => $_POST["nombreR"], "apellido" => $_POST["apellidoR"], "email" => $_POST["emailR"], "puesto" => $_POST["puestoR"], "salario" => $_POST["salarioR"]);

			$tablaBD = "empleados";

			$respuestas = EmpleadosR::RegistrarEmpleadosM($datosC, $tablaBD);

			if ($respuesta == "Bien") {
				header("location:index.php?ruta=empleados");
			}else{
				echo "Error";
			}
		}
	}

    //Mostrar los empleados

    public function MostrarEmpleadosC(){

    	$respuesta = EmpleadosM::MostrarEmpleadosM($tablaBD);

    	foreach ($respuesta as $key -> $value){
    		echo'<tr>
				<td>'.$value["nombre"].'</td>
				<td>'.$value["apellido"].'</td>
				<td>'.$value["email"].'</td>
				<td>'.$value["puesto"].'</td>
				<td>'.$value["salario"].'</td>

				<td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
				
				<td><a href="index.php?ruta=empleados&idB='.$value["id"].'"><button>Borrar</button></a></td>
			</tr>';
    	}
    }
    //Editar empleado

    public function EditarEmpleadosC(){

    	$datosC = $_GET["id"];

    	StablaBD = "empleados";

    	$respuesta = EmpleadosM::EditarEmpleadoM($datosC, $tablaBD);

    	echo'<input type="hidden" value="'.$respuesta["id"].'" name="idE"> //value es lo que viene dentro del input

    	<input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombreE" required>

		<input type="text" placeholder="Apellido" value="'.$respuesta["apellido"].'"name="apellidoE" required>

		<input type="email" placeholder="Email" value="'.$respuesta["email"].'"name="emailE " required>

		<input type="text" placeholder="Puesto" value="'.$respuesta["puesto"].'"name="puestoE" required>

		<input type="text" placeholder="Salario" 
		value="'.$respuesta["salario"].'"name="salarioE" required> 
		<input type="submit" value="Actualizar">';
    }

    //Actualizar empleado
    public function ActualizarEmpleadosC(){

    	if (isset($_POST["nombreE"])) {
    		
    		$datosC = array("id"=>$_POST["idE"], "nombre"=>$_POST["nombreE"], "apellido"=>$_POST["apellidoE"], "email"=>$_POST["emailE"], "puesto"=>$_POST["puestoE"],"salario"=>$_POST["salarioE"]);

    		$tablaBD = "empleados";

    		$respuesta = EmpleadosM::ActualizarEmpleadosM($datosC, $tablaBD);

    		if ($respuesta == "Bien") {
				header("location:index.php?ruta=empleados"); //si se actualiza bien en la base de datos nos va a recargar la pag de empleados
			}else{
				echo "Error";
			}
		
    	}
    }

    //Eliminar empleados

    public function BorrarEmpleadoC(){

    	if (isset($_GET["idB"])) {
    		$datosC = $_GET["idB"];

    		$tablaBD = "empleados";

    		$respuesta = EmpleadosM::BorrarEmpleadoM($datosC, $tablaBD);

    		if ($respuesta == "Bien") {
    			header("location:index.php?ruta=Empleados");
    		}else{
    			echo "error";
    		}
    	}
    }
}