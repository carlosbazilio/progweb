<?php
	require 'sessao.php';
	require 'atualiza_estoque.php';
?>

<p>
	Quantidade de acessos: <?php echo $_SESSION['count']; ?> vez(es).
</p>

<p>
	Id da sessão: <?php echo session_id(); ?>.
</p>

<p>
	Para voltar, <a href="loja.php">clique aqui</a>.
</p>

