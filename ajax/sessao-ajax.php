<?php
	/*
	Extraído de http://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes

	http://php.net/manual/en/function.session-cache-expire.php#81265

	session_cache_expire(1);
	session_start();

	if (empty($_SESSION['count'])) {
	   $_SESSION['count'] = 1;
	} else {
	   $_SESSION['count']++;
	}*/	
	
	session_start();

	if (!isset($_SESSION['CREATED'])) {
	    $_SESSION['CREATED'] = time();
	    $_SESSION['count'] = 1;
	} else 
		if (time() - $_SESSION['CREATED'] > 60) { // 60 segundos
		    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		    $_SESSION['CREATED'] = time();  // update creation time
	    	$_SESSION['count'] = 1;
		}
		else
			$_SESSION['count']++;

?>

<!DOCTYPE html>
<html>
<head>
	<script src="../js/ajax.js"></script>
</head>
<body>

	<div id="texto"><h2>!!! Texto a ser mudado !!!</h2></div>
  	<button type="button" onclick="loadXMLDocAsync('../html/ajax_info.txt', 'texto')">Mudar  conteudo</button>
  	
  	<p>
		Quantidade de acessos: <?php echo $_SESSION['count']; ?> vez(es).
	</p>

	<p>
		Para continuar, <a href="sessao-ajax.php?<?php echo htmlspecialchars(SID); ?>">clique aqui</a>.
	</p>

</body>
</html>


