<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	// debugger($_FILES);
	// debugger($_POST);
	$customer = new customer();
	if (isset($_POST) && !empty($_POST)) {
		$data = array(
					'name' => sanitize($_POST['name']),
					'contact' => (int)($_POST['contact']),
					'address' => sanitize($_POST['address']),
					'added_by' => $_SESSION['user_id']
				);
		debugger($customer);
		debugger($data);
		
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$customer_id = $_POST['id'];
		}
		if (isset($customer_id) && !empty($customer_id)) {
			$act = 'updat';
			$customers = $customer->updateCustomer($data,(int)$_POST['id']);
		}else{
			$act = "add";
			$customers = $customer->addCustomers($data);
		}
		if ($customers) {
			setFlash('../addcustomer','success','Customers '.$act.'ed Successfully');
		}else{
			setFlash('../addcustomer','error','Error While Adding To Database');
		}
	}else if(isset($_GET) && !empty($_GET)){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']>0) {
			$act = substr(md5('Customers-'.$_GET['id'].'-'.$_SESSION['token']),3,15);
			if (isset($_GET['act']) && !empty($_GET['act']) && $act == $_GET['act']) {
				$customer_id = (int)$_GET['id'];
				$Customers_info = $customer->getCustomersById($customer_id);
				debugger($Customers_info);
				if ($Customers_info) {
					$success = $customer->deleteCustomersbyId($Customers_info[0]->id);
					if ($success) {
						setFlash('../addcustomer','success','Customers Deleted Successfully');
					}else{
						setFlash('../addcustomer','error','Error While Deleting Customers');
					}
				}else{
					setFlash('../addcustomer','error','Customers Not found.');
				}

			}else{
				setFlash('../addcustomer','error','Error unknown access to delete');
			}
		}else{
			setFlash('../addcustomer','error','Invalid Id.');
		}
	}
	else{
		setFlash('../addcustomer','error','Unauthorized Access');
	}
?>