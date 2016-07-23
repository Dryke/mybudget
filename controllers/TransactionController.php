<?php
    if(isset($_POST['submitAddTransactionIncome']) || isset($_POST['submitAddTransactionOutcome']))
    {
        $transaction = new Transaction();
        $transaction->name = $_POST['name'];
        $transaction->id_user = $_SESSION['id_user'];
        $transaction->id_category = $_POST['id_category'];
        $transaction->amount = (float) abs($_POST['amount']);

        if(isset($_POST['submitAddTransactionIncome']))
        {
            $transaction->sign = 1;
        }
        else
        {
            $transaction->sign = 0;
        }

        if($transaction->add())
        {
            $notification = new Notification('success', 'Success!', 'Transaction added.');
        }
    }

    if(isset($_POST['submitDeleteTransaction']))
    {
        $transaction = new Transaction();
        $transaction->id = $_POST['id'];
        if($transaction->delete())
        {
            $notification = new Notification('success', 'Success!', 'Transaction deleted.');
        }
    }

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html', array(
        'categories' => Category::getTree(),
        'transactions' => Transaction::getTransactions($id_user)
    ));
?>
