<?php require('includes/config.php'); 

//REDIRECT
if(!$user->isLoggedIn()){ header('Location: login.php'); } 

//PAGE TITLE
$title = 'COAB - Better Living Together';

// INCL HEADER
require('layout/header.php'); 
?>


    <?php include_once('layout/headerbar.php'); ?>

        <!-- SIDEBAR LEFT -->

        <?php include_once('layout/sidebar.php'); ?>

            <!-- END SIDEBAR LEFT -->





            <?php include_once('layout/voting_list.php'); ?>


                <?php 

require('layout/footer.php'); 
?>