<?php
  session_start();

  if(isset($_SESSION['user_id']))
  {
    $user_id = $_SESSION['user_id'];
    $is_logged = true;
  }
  else
  {
    $is_logged = false;
  }

  // Autoload classes
  $classes_dir = scandir(__DIR__.'/../classes');
  foreach($classes_dir as $class)
  {
    if($class != '.' && $class != '..')
    {
      require_once(__DIR__.'/../classes/'.$class);
    }
  }

  $pages = array();
  $pages[] = array(
    'name' => 'Home',
    'link' => 'home'
  );

  if($is_logged)
  {
    $pages[] = array(
      'name' => 'Logout',
      'link' => 'logout'
    );
  }
  else
  {
    $pages[] = array(
      'name' => 'Register',
      'link' => 'register'
    );
    
    $pages[] = array(
      'name' => 'Login',
      'link' => 'login'
    );
  }

  if(isset($_GET['page']))
  {
    $actual_page = $_GET['page'];
  }
  else
  {
    $actual_page = 'home';
  }

  require_once('dispatcher.php');
?>
