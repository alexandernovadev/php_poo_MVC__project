<h1>Bienvenido a mi web con MVC</h1>
<?php
require_once 'autoload.php';

// A esto se le llama controlador frontal
// Se encarga de comprobar si los controladore o vista existen
// La vaina es que se hace con parametros get, Se ve feo
// Pero pues es una clase prueba

if(isset($_GET['controller'])){
	// Usuario y usuario es lo mismo AQUI no es sensible
	$nombre_controlador = $_GET['controller'].'Controller';
}else{
	// Aqui verifica que el controlador exista
	echo "La pagina que buscas no existe (La name controller por GET no esta en la url)";
	exit();
}

if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	// El autoLoad se enviar cuando hago una instancia

	
	echo "CONTROLADOR : ".get_class($controlador)."<br>";
	// Verifica que la clase exista y la accion exista
	// Mucho codigo ?? Solo con este if basta
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		// echo "ACCION : ".get_class($controlador)."<br>";
		$action = $_GET['action'];
		$controlador->$action();
	}else{
		echo "La pagina que buscas no existe (Accion No existe)";
	}
}else{
	echo "La pagina que buscas no existe CONTRROLER";
}

