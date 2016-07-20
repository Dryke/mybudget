<?php
    $transaction_add = false;
    $categories = Category::getTree();

    if(isset($_POST['submitAddTransaction']))
    {
        $amount = (float) $_POST['amount'];

        $transaction = new Transaction();
        $transaction->name = $_POST['name'];
        $transaction->id_user = $_SESSION['id_user'];
        $transaction->id_category = $_POST['id_category'];
        $transaction->amount = abs($amount);

        if($amount > 0)
        {
            $transaction->sign = 1;
        }
        else
        {
            $transaction->sign = 0;
        }

        if($transaction->add())
        {
            $transaction_add = true;
        }
    }
?>
