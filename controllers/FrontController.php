<?php
    echo $twig->render('header.html', array(
        'actual_page' => $actual_page,
        'pages' => $pages
    ));
    require_once(ucfirst($actual_page).'Controller.php');
    echo $twig->render('footer.html');
?>
