<?php
	require 'conecta_banco.php';

    $sth = $conn->prepare("SELECT * FROM livro WHERE estoque > 0 ORDER BY titulo");
    $sth->execute();
    // http://php.net/manual/pt_BR/pdostatement.fetchall.php
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);

	//$sth = null; 
    $conn = null;
?>

