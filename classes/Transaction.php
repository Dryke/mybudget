<?php
  class Transaction
  {
    public $id;
    public $id_user;
    public $id_category;
    public $name;
    public $amount;
    public $sign;
    public $date_add;

    public function add()
    {
      $db = new Db();
      return $db->execute('INSERT INTO transaction(id_user, id_category, name, amount, sign, date_add)
        VALUES("'.$this->id_user.'", "'.$this->id_category.'", "'.$this->name.'", "'.$this->amount.'", "'.$this->sign.'", NOW())');
    }
  }
?>
