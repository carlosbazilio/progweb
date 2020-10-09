<?php
    $user = $_POST['user'];
    $password = $_POST['password'];

	$servername = "127.0.0.1";
	$database = "progweb";
	$serverusername = "usuariomysql";
	$serverpassword = "#Senha123#";

	try {
	    //$conn = new PDO("pgsql:host=$servername;dbname=postgres;user=$serverusername;password=$serverpassword");
	    $conn = new PDO("mysql:host=$servername;dbname=$database;port=3306", $serverusername, $serverpassword);

	    echo "Connected successfully <br/>";

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sth = $conn->prepare("SELECT * FROM usuario WHERE nome = '$user'");
	    $sth->execute();
	    // http://php.net/manual/pt_BR/pdostatement.fetchall.php
	    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

	    if ($results[0]['senha'] == $password) {
	    	echo "Login successful!<br/>";
	    	 
	    	$sth = $conn->prepare("SELECT * FROM empresa");
	    	$sth->execute();
	    	$results = $sth->fetchAll(PDO::FETCH_ASSOC);

	    	//var_dump($results);

	    	echo '<table border=1>';
	    	echo '<tr><th>Nome</th><th>Empresa</th></tr>';
		    	foreach ($results as $value) {
		    		echo '<tr>';
		    		echo '<td>' . $value['nome'] . '</td><td>' . $value['endereco'] . '</td>';
		    		echo '</tr>';
		    	}
		    echo '</table>';
	    }
	    else {
	    	//var_dump($results);
	    	echo "Login fail!<br/>";
	    }

		//$sth = null; 
	    $conn = null;
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
?>
