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
      if(User::nameAvailable($this->name))
      {
        if($db->execute('INSERT INTO user(name, password, date_add) VALUES("'.$this->name.'", "'.$this->password.'", NOW())'))
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
    }

    public static function nameAvailable($name)
    {
      $db = new Db();
      if($db->getNumRows('SELECT id FROM user WHERE name = "'.$name.'"') > 0)
      {
        return false;
      }
      else
      {
        return true;
      }
    }

    public function login()
    {
      $db = new Db();
      if($user_id = $db->getRow('SELECT id FROM user WHERE name = "'.$this->name.'" AND password = "'.$this->password.'"'))
      {
        return $user_id;
      }
      else
      {
        return false;
      }
    }
  }
?>
