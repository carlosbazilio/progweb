<!-- PHP, ASP, JSP, Python, Lua, JS, Ruby, ... -->

<a href="http://www.ic.uff.br/~bazilio/cursos/progweb">Página do Curso</a>
<?php
	$nome = $_POST["usuario"];
	if (isset($nome))
		echo $nome . " logado!";
	else
		echo "Usuario inexistente !!!";
?>

