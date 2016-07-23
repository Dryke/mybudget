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

    // Sort the array by "sum_amount" for Transaction
    function sort_sum_amount($a, $b)
    {
        return $b['sum_amount'] - $a['sum_amount'];
    }

    $db = new Db();
    $notification = new Notification();
?>
