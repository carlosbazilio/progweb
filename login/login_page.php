<?php
    $user = $_POST['user'];
    $password = $_POST['password'];
    if (($user == 'bazilio') and ($password == '123')) {
        header('Location: success.php');
        //include 'success.php';
    	exit;
    }
    else {
    	//header('Location: fail.php'); 
    	include 'fail.php';
        //echo '<br/>Login sem sucesso!';
    	exit; 
    }
?>
