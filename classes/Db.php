<?php
  class Db
  {
    public $server_name = 'localhost';
    public $user_name = 'root';
    public $password = '';
    public $select_db = 'mybudget';

    public function connect()
    {
      $db = new mysqli($this->server_name, $this->user_name, $this->password);
      $db->select_db($this->select_db);
      return $db;
    }

    public function execute($query)
    {
      $db = $this->connect();
      if(!$db->query($query))
      {
        echo '<p>'.$db->error.'</p>';
        return false;
      }
      else
      {
        return true;
      }
    }
  }
?>
