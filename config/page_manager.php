<?php
    $pages = array();
    $pages[] = array(
        'name' => 'Dashboard',
        'link' => 'dashboard',
        'icon' => 'bar-chart'
    );

    if($is_logged)
    {
        $pages[] = array(
            'name' => 'Category',
            'link' => 'category',
            'icon' => 'align-left'
        );
        $pages[] = array(
            'name' => 'Transaction',
            'link' => 'transaction',
            'icon' => 'money'
        );
        $pages[] = array(
            'name' => 'Outcomes',
            'link' => 'outcomes',
            'icon' => 'arrow-circle-o-up'
        );
        $pages[] = array(
            'name' => 'Incomes',
            'link' => 'incomes',
            'icon' => 'arrow-circle-o-down'
        );
    }
    else
    {
        $pages[] = array(
            'name' => 'Register',
            'link' => 'register',
            'icon' => 'plug'
        );
    }

    $pages[] = array(
        'name' => 'Backup',
        'link' => 'backup',
        'icon' => 'database'
    );

    $pages[] = array(
        'name' => 'GitHub',
        'link' => 'https://github.com/Dryke/mybudget',
        'icon' => 'github',
        'custom' => true
    );

    if($is_logged)
    {
        $pages[] = array(
            'name' => 'Logout',
            'link' => 'logout',
            'icon' => 'power-off'
        );
    }
    else
    {
        $pages[] = array(
            'name' => 'Login',
            'link' => 'login',
            'icon' => 'rocket'
        );
    }

    if(isset($_GET['page']))
    {
        $actual_page = $_GET['page'];
    }
    else
    {
        $actual_page = 'dashboard';
    }
?>
