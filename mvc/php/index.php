<!--
Autor: Peter Clayder
-->

<?php
require 'controller/Controller.php';
require 'autoloader.php';

$metodo = 'home';
if(isset($_GET['action'])){
    $metodo = $_GET['action'];
}
$controller = new Controller($metodo);
$controller->index();
