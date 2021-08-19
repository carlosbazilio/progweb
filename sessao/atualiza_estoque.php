<?php
	require 'conecta_banco.php';
	require 'util.php';

	$ids_carrinho = array_map(function ($livro) {return retornaId($livro);}, $carrinho);

	$sql = "UPDATE livro SET estoque=estoque-1 WHERE id IN (" . implode(',', $ids_carrinho) . ")";

	// Prepare statement
	$stmt = $conn->prepare($sql);

	// execute the query
	$stmt->execute();

    $conn = null;
?>

