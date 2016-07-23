<?php
    if($is_logged)
    {
        $transaction = new Transaction();
        $transaction->id_user = $id_user;
        echo $twig->render($actual_page.'.html', array(
            'outcomes_by_category' => $transaction->getTransactionsByCategory(0),
            'incomes_by_category' => $transaction->getTransactionsByCategory(1),
            'total_outcomes' => $transaction->getTotalTransactions(0),
            'total_incomes' => $transaction->getTotalTransactions(1),
            'balance' => $transaction->getBalance()
        ));
    }
    else
    {
        //echo $twig->render($actual_page.'.html');
    }
?>
