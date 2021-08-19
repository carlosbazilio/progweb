<?php
	$servername = "127.0.0.1";
	$database = "postgres";
	$serverusername = "postgres";
	$serverpassword = "adminpostgres";

	try {
		// String de conexão
	    $conn = new PDO("pgsql:host=$servername;dbname=postgres;user=$serverusername;password=$serverpassword");

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
?>
