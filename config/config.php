<?php
    /* Twig */
    require_once('./vendor/autoload.php');
    $loader = new Twig_Loader_Filesystem('./templates/');
    $twig = new Twig_Environment($loader, array(
        //'cache' => './cache/',
    ));

    require_once('session_manager.php');
    require_once('autoload.php');
    require_once('page_manager.php');
?>
