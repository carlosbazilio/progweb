<?php
	function consultaCEP($valor) {
		// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/" . $valor . "/xml/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        echo $output;
	}

	$valor = $_GET["valor"];
	if (!is_null($valor))
		echo consultaCEP($valor);
	else
		echo "CEP não informado!";
?>
