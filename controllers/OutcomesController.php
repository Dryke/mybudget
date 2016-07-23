<?php
    if($is_logged)
    {
        $transaction = new Transaction();
        $transaction->id_user = $id_user;
        echo $twig->render($actual_page.'.html', array(
            'outcomes' => $transaction->getTransactions(0)
        ));
    }
?>
