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
                VALUES("'.$this->id_user.'", "'.$this->id_category.'", "'.$this->name.'", "'.$this->amount.'", "'.$this->sign.'", "'.$this->date_add.'")');
        }

        public function delete()
        {
            $db = new Db();
            return $db->execute('DELETE FROM transaction WHERE id = "'.$this->id.'"');
        }

        public static function resetCategoryAssociation($id_category)
        {
            $db = new Db();
            return $db->execute('UPDATE transaction SET id_category = 0 WHERE id_category = "'.$id_category.'"');
        }

        public function getTransactions($sign = -1)
        {
            $db = new Db();
            if($sign == -1)
            {
                $sign_query = '';
            }
            else
            {
                $sign_query = 'AND sign = '.$sign;
            }

            $transactions = $db->getRows('SELECT * FROM transaction WHERE id_user = "'.$this->id_user.'" '.$sign_query.' ORDER BY date_add DESC');
            foreach($transactions as $key => $transaction)
            {
                $category = $db->getRow('SELECT name FROM category WHERE id = "'.$transaction['id_category'].'"');
                $transactions[$key]['category_name'] = $category->name;
            }
            return $transactions;
        }

        public function getTransactionsByCategory($sign)
        {
            $db = new Db();
            $transactions_by_category = array();
            $key = 0;
            $categories = $db->getRows('
                SELECT id, name FROM category WHERE id_parent = 0
            ');

            foreach($categories as $category)
            {
                $transaction = $db->getRow('
                    SELECT SUM(amount) AS sum_amount
                    FROM transaction
                    WHERE id_user = "'.$this->id_user.'"
                    AND id_category = "'.$category['id'].'"
                    AND sign = "'.$sign.'"
                ');
                $transactions_by_category[$key]['sum_amount'] = $transaction->sum_amount;
                $transactions_by_category[$key]['name'] = $category['name'];

                // We also get the sum_amount from subcategories
                $children = $db->getRows('SELECT id FROM category WHERE id_parent = "'.$category['id'].'"');
                foreach($children as $child)
                {
                    $transaction = $db->getRow('
                        SELECT SUM(amount) AS sum_amount
                        FROM transaction
                        WHERE id_user = "'.$this->id_user.'"
                        AND id_category = "'.$child['id'].'"
                        AND sign = "'.$sign.'"
                    ');
                    $transactions_by_category[$key]['sum_amount'] += $transaction->sum_amount;
                }
                $key++;
            }

            foreach($transactions_by_category as $key => $transaction_by_category)
            {
                if($transaction_by_category['sum_amount'] == 0)
                {
                    unset($transactions_by_category[$key]);
                }
            }

            usort($transactions_by_category, "sort_sum_amount");

            return $transactions_by_category;
        }

        public function getTotalTransactions($sign)
        {
            $db = new Db();
            $total_transaction = $db->getRow('
                SELECT SUM(amount) AS sum_amount
                FROM transaction
                WHERE id_user = "'.$this->id_user.'"
                AND sign = "'.$sign.'"
            ');
            return $total_transaction->sum_amount;
        }

        public function getBalance()
        {
            $db = new Db();
            $incomes = $db->getRow('SELECT SUM(amount) AS sum_amount FROM transaction WHERE id_user = "'.$this->id_user.'" AND sign = 1');
            $outcomes = $db->getRow('SELECT SUM(amount) AS sum_amount FROM transaction WHERE id_user = "'.$this->id_user.'" AND sign = 0');
            return $incomes->sum_amount - $outcomes->sum_amount;
        }
    }
?>
