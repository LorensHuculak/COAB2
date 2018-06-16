<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $bills = new Bills();
    $bills->removeBill($_POST['billsid']);
}

?>