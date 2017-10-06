<?php
    $user = $_POST['user'];
    $password = $_POST['password'];
    //if (($user != 'bazilio') or ($password != '123')) {
    	//header('Location: fail.php'); 
    	//include 'fail.php';
        //echo '<br/>Login sem sucesso!';
    	//exit; 
    //}

	$servername = "localhost";
	$serverusername = "postgres";
	$serverpassword = "adminpostgres";

	try {
	    $conn = new PDO("pgsql:host=$servername;dbname=postgres;user=$serverusername;password=$serverpassword");

	    echo "Connected successfully <br/>";

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sth = $conn->prepare("SELECT * FROM public.usuario WHERE login = '$user'");
	    $sth->execute();
	    // http://php.net/manual/pt_BR/pdostatement.fetchall.php
	    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

	    if ($results[0]['password'] == $password) {
	    	echo "Login successful!<br/>";
	    	 
	    	$sth = $conn->prepare("SELECT * FROM public.company");
	    	$sth->execute();
	    	$results = $sth->fetchAll(PDO::FETCH_ASSOC);

	    	//var_dump($results);

	    	echo '<table border=1>';
	    	echo '<tr><th>Nome</th><th>Empresa</th></tr>';
		    	foreach ($results as $value) {
		    		echo '<tr>';
		    		echo '<td>' . $value['name'] . '</td><td>' . $value['address'] . '</td>';
		    		echo '</tr>';
		    	}
		    echo '</table>';
	    }
	    else {
	    	//var_dump($results);
	    	echo "Login fail!<br/>";
	    }

		$sth = null;
	    $conn = null;
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
?>
