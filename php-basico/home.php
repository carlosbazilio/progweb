<!-- PHP, ASP, JSP, Python, Lua, JS, Ruby, ... -->

<p>Fora do Scriptlet PHP</p>

<?php
	$nome = $_POST["usuario"];
	if (!is_null($nome))
		echo "Alô " . $nome;
	else
		echo "Alô Mundo !!!";
?>

