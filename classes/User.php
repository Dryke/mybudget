<?php
  class User
  {
    public $id;
    public $name;
    public $password;
    public $date_add;

    public function register()
    {
      $db = new Db();
      if($db->execute('INSERT INTO user(name, password, date_add) VALUES("'.$this->name.'", "'.$this->password.'", NOw())'))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }
?>
