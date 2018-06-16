<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $tasks = new Tasks();
    $tasks->deleteTask($_POST['tasksid']);
}

?>