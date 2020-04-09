<?php 
    if (isset($_GET) && !empty($_GET)) {
        $Customer_id = (int)$_GET['id'];
        if ($Customer_id) {
            $pass = substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$Customer_id), 3,15);
            if($pass == $_GET['act']){
                $Customer = new customer();
                $customer = $Customer->getCustomerById($Customer_id);
                if ($customer) {
                    $customer = $customer[0];
                    if (isset($_GET['transaction_id']) && !empty($_GET['transaction_id'])) {
                        $transaction_id = (int)$_GET['transaction_id'];
                        $Transaction = new transaction();
                        $transaction_info = $Transaction->getTransactionById($transaction_id);
                        $transaction_info=$transaction_info[0];
                    }else{
                        $Transaction = new transaction();
                        $transactions = $Transaction->getTransactionByCutomerId($customer->id);
                    }
                }else{
                    setFlash('./customer','error','Data not found');
                }
            }else{
                setFlash('./login','error','Unauthorized access or Invalid Action');
            }
        }else{
            setFlash('./customer','error','Invalid ID');
        }
    }else{
        $Transaction = new transaction();
        $transactions = $Transaction->getallTransaction();
    }
?>