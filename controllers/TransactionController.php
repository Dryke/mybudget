<?php
    if(isset($_POST['submitAddTransactionIncome']) || isset($_POST['submitAddTransactionOutcome']))
    {
        $transaction = new Transaction();
        $transaction->name = $_POST['name'];
        $transaction->id_user = $_SESSION['id_user'];
        $transaction->id_category = $_POST['id_category'];
        $transaction->amount = (float) abs($_POST['amount']);
        if($_POST['date_add'] == '')
        {
            $transaction->date_add = date('Y-m-d');
        }
        else
        {
            $transaction->date_add = $_POST['date_add'];
        }


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
        'transactions' => Transaction::getTransactions($id_user),
        'date_now' => date('Y-m-d')
    ));
?>
