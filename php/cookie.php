<?php
	$nome = "teste";
	if (!isset($_COOKIE[$nome]))
		setcookie($nome, "true", time() + 30);
?>

<html>
	<body>
		<?php
			if(!isset($_COOKIE[$nome])) {
			     echo "Cookie named '" . $nome . "' is not set!";
			} else {
			     echo "Cookie '" . $nome . "' is set!<br>";
			     echo "Value is: " . $_COOKIE[$nome];
			}
		?>
	</body>
</html>

