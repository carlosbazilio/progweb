<!-- PHP, ASP, JSP, Python, Lua, JS, Ruby, ... -->

<?php
	$nome = $_POST["usuario"];
	if (isset($nome))
		echo "Alô " . $nome . " Assincrono!";
	else
		echo "Alô Mundo Assincrono !!!";
?>

