<?php

	include_once('../includes/config.php');

if (!empty($_POST)) {
    
    $votings = new Votes();
    $votings->removeVote($_POST['votesid']);
}

?>