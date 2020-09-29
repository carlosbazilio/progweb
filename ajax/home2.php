<!-- PHP, ASP, JSP, Python, Lua, JS, Ruby, ... -->

<?php
	$nome = $_POST["usuario"];
	if (isset($nome))
		echo $nome . " logado!";
	else
		echo "Usuario inexistente !!!";
?>

