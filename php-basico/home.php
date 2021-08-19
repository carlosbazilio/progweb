<?php
	$nome = $_POST["usuario"];
	if (!is_null($nome))
		echo "Alô " . $nome;
	else
		echo "Alô Mundo !!!";
?>
<br/>

