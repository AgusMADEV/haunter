<?php

	include "agusmadev-haunter.php";
	
	// Modifica los campos para añadir tu base de datos a convertir
	
	haunter::deMySQL("localhost","usuario","contraseña","basedatos","tabla")->aCSV("salida.csv");
	haunter::deMySQL("localhost","usuario","contraseña","basedatos","tabla")->aXML("salida.xml");
	haunter::deMySQL("localhost","usuario","contraseña","basedatos","tabla")->aJSON("salida.json");
	haunter::deMySQL("localhost","usuario","contraseña","basedatos","tabla")->aSQLite("salida.sqlite3");

?>