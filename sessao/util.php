<?php
	function retornaId($valor) {
		return substr($valor, 0, strpos($valor, "|"));
	}
	function retornaTitulo($valor) {
		$pos1 = strpos($valor, "|");
		return substr($valor, $pos1+1, strpos($valor, "|", $pos1+1)-2);
	}
	function retornaPreco($valor) {
		$pos1 = strpos($valor, "|");
		$pos2 = strpos($valor, "|", $pos1+1);
		return substr($valor, $pos2);
	}
?>
