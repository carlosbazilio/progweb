<?php
	require 'sessao.php';
	require 'util.php';

	if (isset($_GET['livros'])) {
		$carrinho = $_GET['livros'];
		$_SESSION['carrinho'] = $carrinho;
	}
?>

<?php if (count($carrinho)) : ?>
    <p>Seu carrinho </p>
    <ul>
        <?php foreach ($carrinho as $livro) : ?>
        	<li><?php echo retornaTitulo($livro) ?></li>
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
	Para continuar, <a href="adiciona_carrinho.php">clique aqui</a>.
</p>

<p>
	Para confirmar compra, <a href="checkout.php">clique aqui</a>.
</p>

<p>
	Para voltar, <a href="loja.php">clique aqui</a>.
</p>

