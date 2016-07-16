<?php
  class Category
  {
    public $id;
    public $id_parent;
    public $name;

    public function add()
    {
      $db = new Db();
      return $db->execute('INSERT INTO category(name, id_parent) VALUES("'.$this->name.'", "'.$this->id_parent.'")');
    }

    public static function getCategories()
    {
      $db = new Db();
      return $db->getRows('SELECT * FROM category');
    }
  }
?>
