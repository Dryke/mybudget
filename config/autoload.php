<?php
    // Autoload classes
    $classes_dir = scandir(__DIR__.'/../classes');
    foreach($classes_dir as $class)
    {
        if($class != '.' && $class != '..')
        {
            require_once(__DIR__.'/../classes/'.$class);
        }
    }
?>
