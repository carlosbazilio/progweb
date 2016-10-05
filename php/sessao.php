<?php

	/*session_cache_expire(1);
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

<p>
	Quantidade de acessos: <?php echo $_SESSION['count']; ?> vez(es).
</p>

<p>
	Para continuar, <a href="sessao.php?<?php echo htmlspecialchars(SID); ?>">clique aqui</a>.
</p>

