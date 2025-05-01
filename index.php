<?php

	include "agusmadev-haunter.php";
	
	haunter::deMySQL("localhost","evoluciona","evoluciona","evoluciona","productos")->aCSV("salida.csv");
	haunter::deMySQL("localhost","evoluciona","evoluciona","evoluciona","productos")->aXML("salida.xml");
	haunter::deMySQL("localhost","evoluciona","evoluciona","evoluciona","productos")->aJSON("salida.json");
	haunter::deMySQL("localhost","evoluciona","evoluciona","evoluciona","productos")->aSQLite("salida.sqlite3");

?>