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

  $pages = array(
    0 => array(
      'name' => 'Home',
      'link' => 'home'
    ),
    1 => array(
      'name' => 'Register',
      'link' => 'register'
    )
  );

  if(isset($_GET['page']))
  {
    $actual_page = $_GET['page'];
  }
  else
  {
    $actual_page = 'home';
  }
?>
