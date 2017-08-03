<?php
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASS","lyndaphp17");
	define("DB_NAME","widget_corp");
	
	// 1. Creant una connecció a una base de dades
	$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	// Test si la connexió s'ha realitzat
	if(mysqli_connect_errno()) {
		die("Error en la connexió amb la Base de Dades:".
		mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
?>