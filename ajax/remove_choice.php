<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $choices = new Choices();
    $choices->removeChoice($_POST['choicesid']);
}

?>