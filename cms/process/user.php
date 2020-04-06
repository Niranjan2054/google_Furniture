<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	// debugger($_POST,True);
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		if ($_SESSION['id'] !=1) {
			setFlash('../user','error','You have no permission to create or edit or delete User Account');
		}
	}else{
		setFlash('../index','error','Check Login! You are not Logged in');
	}
	$user = new user();
	if (isset($_POST) && !empty($_POST)) {
		$data = array(
					'username' => sanitize($_POST['username']),
					'email' => filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
					'password' => sha1($_POST['email'].$_POST['password']),
					'role' => sanitize($_POST['role']),
				);
		// debugger($data,True);
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$user_id = $_POST['id'];
		}
		if (isset($user_id) && !empty($user_id)) {
			$act = 'updat';
			$users = $user->updateuser($data,(int)$_POST['id']);
		}else{
			$act = "add";
			$users = $user->addUser($data);
		}
		if ($users) {
			setFlash('../user','success','User '.$act.'ed Successfully');
		}else{
			setFlash('../user','error','Error While Adding To Database');
		}
	}else if(isset($_GET) && !empty($_GET)){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']>0) {
			$act = substr(md5('User-'.$_GET['id'].'-'.$_SESSION['token']),3,15);
			if (isset($_GET['act']) && !empty($_GET['act']) && $act == $_GET['act']) {
				$user_id = (int)$_GET['id'];
				$User_info = $user->getUserById($user_id);
				if ($User_info) {
					$success = $user->deleteUserbyId($User_info[0]->id);
					if ($success) {
						setFlash('../user','success','User Deleted Successfully');
					}else{
						setFlash('../user','error','Error While Deleting User');
					}
				}else{
					setFlash('../user','error','User Not found.');
				}
			}else{
				setFlash('../user','error','Error unknown access to delete');
			}
		}else{
			setFlash('../user','error','Invalid Id.');
		}
	}else{
		setFlash('../user','error','Unauthorized Access');
	}
?>