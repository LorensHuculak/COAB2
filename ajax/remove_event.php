<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $events = new Events();
    $events->removeEvent($_POST['eventsid']);
}

?>