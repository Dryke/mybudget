<?php
  class Db
  {
    public $server_name = '127.0.0.1';
    public $user_name = 'root';
    public $password = '';
    public $use = 'mybudget';

    public function connect()
    {
      $mysqli = new mysqli($this->server_name, $this->user_name, $this->password);

      if($mysqli->connect_error)
      {
        Db::showError($mysqli->connect_errno .' - '.$mysqli->connect_error);
      }
      else
      {
        $mysqli->select_db($this->use);
        return $mysqli;
      }
    }

    public function execute($query)
    {
      $mysqli = $this->connect();
      if(!$mysqli->query($query))
      {
        Db::showError($mysqli->error);
        return false;
      }
      else
      {
        return true;
      }
    }

    public function getNumRows($query)
    {
      $mysqli = $this->connect();
      if($result = $mysqli->query($query))
      {
        return($result->num_rows);
      }
      else
      {
        Db::showError($mysqli->error);
        return false;
      }
    }

    public function getRow($query)
    {
      $mysqli = $this->connect();
      if($result = $mysqli->query($query))
      {
        if($result->num_rows > 0)
        {
          return($result->fetch_object());
        }
        else
        {
          return false;
        }
      }
      else
      {
        Db::showError($mysqli->error);
        return false;
      }
    }

    public static function showError($error)
    {
      die('<p>Error mysqli : '.$error.'</p>');
    }
  }
?>
