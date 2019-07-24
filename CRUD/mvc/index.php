<?php
require_once "Contoladores/rutasC.php";
require_once "Contoladores/adminC.php";
require_once "Contoladores/empleadosC.php";

require_once "Modelos/rutasM.php";
require_once "Modelos/adminM.php";
require_once "Modelos/empleadosM.php";

$rutas = new RutasControlador();
$rutas -> Plantilla();