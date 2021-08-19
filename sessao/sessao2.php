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
			$_SESSION = [];
		    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		    $_SESSION['CREATED'] = time();  // update creation time
	    	$_SESSION['count'] = 1;
		}
		else
			$_SESSION['count']++;


	$livros = [];

	if (isset($_GET['livros'])) {
		$_SESSION['livros'] = $_GET['livros'];
	}

	if (isset($_SESSION['livros'])) {
		$livros = $_SESSION['livros'];
	}

?>

<?php if (count($livros)) : ?>
    <p>Seu carrinho </p>
    <ul>
        <?php foreach ($livros as $livro) : ?>
        	<li><?php echo $livro ?></li>            
        <?php endforeach ?>
    </ul>
<?php else : ?>    
    <p>Carrinho vazio.</p>
<?php endif ?>

<p>
	Quantidade de acessos: <?php echo $_SESSION['count']; ?> vez(es).
</p>

<p>
	Id da sessão: <?php echo session_id(); ?>.
</p>

<p>
	Para continuar, <a href="sessao.php">clique aqui</a>.
</p>

