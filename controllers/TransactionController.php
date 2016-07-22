<?php
    if(isset($_POST['submitAddTransaction']))
    {
        $transaction = new Transaction();
        $transaction->name = $_POST['name'];
        $transaction->id_user = $_SESSION['id_user'];
        $transaction->id_category = $_POST['id_category'];
        $transaction->amount = (float) abs($_POST['amount']);

        if($transaction->amount > 0)
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

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html', array(
        'categories' => Category::getTree(),
        'transactions' => Transaction::getTransactions($id_user)
    ));
?>
