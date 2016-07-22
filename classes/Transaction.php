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

        public static function resetCategoryAssociation($id_category)
        {
            $db = new Db();
            return $db->execute('UPDATE transaction SET id_category = 0 WHERE id_category = "'.$id_category.'"');
        }

        public static function getTransactions($id_user)
        {
            $db = new Db();
            $transactions = $db->getRows('SELECT * FROM transaction WHERE id_user = "'.$id_user.'"');
            foreach($transactions as $key => $transaction)
            {
                $category = $db->getRow('SELECT name FROM category WHERE id = "'.$transaction['id_category'].'"');
                $transactions[$key]['category_name'] = $category->name;
            }
            return $transactions;
        }

        public static function getTopOutcome($id_user)
        {
            $db = new Db();
        }
    }
?>
