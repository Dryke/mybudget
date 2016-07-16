<?php
  $pages = array();
  $pages[] = array(
    'name' => 'Home',
    'link' => 'home'
  );

  if($is_logged)
  {
    $pages[] = array(
      'name' => 'Category',
      'link' => 'category'
    );
    $pages[] = array(
      'name' => 'Transaction',
      'link' => 'transaction'
    );
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
?>
