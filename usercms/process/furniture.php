<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	// debugger($_FILES);
	// debugger($_POST);
	$furniture = new furniture();
	if (isset($_POST) && !empty($_POST)) {
		$data = array(
					'name' => sanitize($_POST['name']),
					'saleprice' => (int)($_POST['saleprice']),
					'purchaseprice' => (int)($_POST['purchaseprice']),
					'added_by' => $_SESSION['user_id']
				);
		debugger($furniture);
		debugger($data);
		
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$furniture_id = $_POST['id'];
		}
		if (isset($furniture_id) && !empty($furniture_id)) {
			$act = 'updat';
			$furnitures = $furniture->updateFurniture($data,(int)$_POST['id']);
		}else{
			$act = "add";
			$furnitures = $furniture->addFurnitures($data);
		}
		if ($furnitures) {
			setFlash('../addfurniture','success','Furnitures '.$act.'ed Successfully');
		}else{
			setFlash('../addfurniture','error','Error While Adding To Database');
		}
	}else if(isset($_GET) && !empty($_GET)){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']>0) {
			$act = substr(md5('Furnitures-'.$_GET['id'].'-'.$_SESSION['token']),3,15);
			if (isset($_GET['act']) && !empty($_GET['act']) && $act == $_GET['act']) {
				$furniture_id = (int)$_GET['id'];
				$Furnitures_info = $furniture->getFurnitureById($furniture_id);
				debugger($Furnitures_info);
				if ($Furnitures_info) {
					$success = $furniture->deleteFurniturebyId($Furnitures_info[0]->id);
					if ($success) {
						setFlash('../furniture','success','Furnitures Deleted Successfully');
					}else{
						setFlash('../furniture','error','Error While Deleting Furnitures');
					}
				}else{
					setFlash('../furniture','error','Furnitures Not found.');
				}

			}else{
				setFlash('../furniture','error','Error unknown access to delete');
			}
		}else{
			setFlash('../furniture','error','Invalid Id.');
		}
	}
	else{
		setFlash('../furniture','error','Unauthorized Access');
	}
?>