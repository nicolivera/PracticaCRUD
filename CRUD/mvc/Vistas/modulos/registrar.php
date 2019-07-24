<?php
  
  session_start();

  if (!$_SESSION["Ingreso"]) {
  	header("location:index.php?ruta=ingreso");
  	exit();
  }
  ?>
	<br>
	<h1>REGISTRAR UN EMPLEADO</h1>

	<form method="post">
		
		<input type="text" placeholder="Nombre" name="nombreR" required>

		<input type="text" placeholder="Apellido" name="apellidoR" required>

		<input type="email" placeholder="Email" name="email" required>

		<input type="text" placeholder="Puesto" name="puestoR" required>

		<input type="text" placeholder="Salario" name="salarioR" required> //la R para identificarlo a la hora de extraerlo con el metodo post

		<input type="submit" value="Registrar">

	</form>

<?php

$registrar = new EmpleadosC(); //nueva clase
$registrar -> RegistrarEmpleadosC();//nueva función
