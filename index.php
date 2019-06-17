<?php

require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


if (isset($_GET['controller'])) {
	$nombre_controlador = $_GET['controller'] . 'Controller';
	echo $nombre_controlador;
	echo "</br>";
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
	$nombre_controlador = controller_default;
} else {
	show_error();
	exit();
}

if (class_exists($nombre_controlador)) {
	$controlador = new $nombre_controlador();

	if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
		$action = $_GET['action'];
		$controlador->$action();
	} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
		$action_default = action_default;
		$controlador->$action_default();
	} else {
		show_error();
	}
} else {
	echo "</br>";
	echo "no se puedo encontrar la pagina";
}


require_once 'views/layout/footer.php';
