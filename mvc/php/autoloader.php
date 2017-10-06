<?php

function base_url(string $pagina){
    $url = "http://" . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
    $retirar = array($_SERVER['QUERY_STRING'], "index.php", "?");
    $url = str_replace($retirar, '', $url);
    $urlNova = $url."index.php?action=".$pagina;
    return $urlNova;
}

