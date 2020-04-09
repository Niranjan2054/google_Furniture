<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	// debugger($_POST,true);
	$transaction = new transaction();
	if (isset($_POST) && !empty($_POST)) {
		$data = array(
					'customer_id' => (int)($_POST['customer_id']),
					'furniture_id' => (int)($_POST['furniture_id']),
					'no_of_piece' => (int)($_POST['no_of_piece']),
					'accountType' => sanitize($_POST['accountType']),
					'type' => sanitize($_POST['type']),
					'transaction_date' =>sanitize($_POST['transaction_date']),
					'added_by' => $_SESSION['user_id']
				);
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$transaction_id = $_POST['id'];
		}
		if (isset($transaction_id) && !empty($transaction_id)) {
			$act = 'updat';
			$transactions = $transaction->updateTransaction($data,(int)$_POST['id']);
		}else{
			$act = "add";
			$transactions = $transaction->addTransactions($data);
		}
		if ($transactions) {
			setFlash("../addtransaction?id=".$data['customer_id'].'&act='.substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$data['customer_id']), 3,15),'success','Transactions '.$act.'ed Successfully');
		}else{
			setFlash("../addtransaction?id=".$data['customer_id'].'&act='.substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$data['customer_id']), 3,15),'error','Error While Adding To Database');
		}
	}else if(isset($_GET) && !empty($_GET)){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']>0) {
			$act = substr(md5('Transactions-'.$_GET['id'].'-'.$_SESSION['token']),3,15);
			if (isset($_GET['act']) && !empty($_GET['act']) && $act == $_GET['act']) {
				$transaction_id = (int)$_GET['id'];
				$Transactions_info = $transaction->getTransactionById($transaction_id);
				// debugger($Transactions_info,true);
				if ($Transactions_info) {
					$success = $transaction->deleteTransactionbyId($Transactions_info[0]->id);
					if ($success) {
						setFlash('../transaction?id='.$Transactions_info[0]->customer_id.'&act='.substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$Transactions_info[0]->customer_id), 3,15),'success','Transactions Deleted Successfully');
					}else{
						setFlash('../transaction','error','Error While Deleting Transactions');
					}
				}else{
					setFlash('../transaction','error','Transactions Not found.');
				}

			}else{
				setFlash('../transaction','error','Error unknown access to delete');
			}
		}else{
			setFlash('../transaction','error','Invalid Id.');
		}
	}
	else{
		setFlash('../transaction','error','Unauthorized Access');
	}
?>