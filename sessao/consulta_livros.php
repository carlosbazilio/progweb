<?php
	require 'conecta_banco.php';

    $sth = $conn->prepare("SELECT * FROM livro");
    $sth->execute();
    // http://php.net/manual/pt_BR/pdostatement.fetchall.php
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

	echo '<table border=1>';
	echo '<tr><th>Título</th><th>Autor</th></tr>';
    	foreach ($results as $value) {
    		echo '<tr>';
    		echo '<td>' . $value['titulo'] . '</td><td>' . $value['autor'] . '</td>';
    		echo '</tr>';
    	}
    echo '</table>';

	//$sth = null; 
    $conn = null;
?>

