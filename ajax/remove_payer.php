<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $payers = new Payers();
    $payers->removePayer($_POST['payersid']);
}

?>