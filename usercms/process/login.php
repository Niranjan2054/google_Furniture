<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'config/init.php';
// debugger($_POST,true);
$data = array();
if (isset($_POST) && !empty($_POST)) {
	if (isset($_POST['username']) && !empty($_POST['username'])) {
		$data['username'] = sanitize($_POST['username']);
		if ($data['username']) {
			if (isset($_POST['password']) && !empty($_POST['password'])) {
				$data['password']=sha1($data['username'].$_POST['password']);
				$user = new user();
				$user_info= $user->getUserByEmail($data['username']);
				debugger($user_info);
				debugger($data);
				if (isset($user_info[0]->username) && !empty($user_info[0]->username)) {
					if ($user_info[0]->password ==$data['password']) {
						if ($user_info[0]->role =="Admin") {
							if ($user_info[0]->status == "Active") {
								$_SESSION['user_id'] = $user_info[0]->id;
								$_SESSION['admin_name'] = $user_info[0]->username;
								$_SESSION['email'] = $user_info[0]->email;
								$_SESSION['role'] = $user_info[0]->role;
								$_SESSION['status'] = $user_info[0]->status;
								$token = setToken(100);
								$_SESSION['token'] = $token;
								if (isset($_POST['remember']) && !empty($_POST['remember'])){
									setcookie('_auth_user',$token,(time()+864000),'/');
								}
								$args = array(
										'session_token'=>$_SESSION['token'],
										'last_login' =>date('Y-m-d h:i:s'),
										'last_ip'=>$_SERVER['REMOTE_ADDR']
								);	
								$user->updateUser($args,$user_info[0]->id);
								setFlash('../index','success','You are successfully logged in. Welcome to the dashboard.');
							}else{
								setFlash('../login','error','This account is not active. Do contact Adminstration.');
							}
						}else{
							setFlash('../login','error','You are not allowed to logged in Here.');
						}

					}else{
						setFlash('../login','error','Password doesnot matched.');
					}
				}
				debugger($_SESSION);
				setFlash('../login','error','Email Doesnot Matched.');
			}else{
				setFlash('../login','error','Password Required.');
			}
		}else{
			setFlash('../login','error','Invalid Username. Username must be Email Type.');
		}
	}else if(isset($_POST['transaction_id']) && !empty($_POST['transaction_id'])){
		// sabai kaam transaction sambhandi
		$data['username'] = $_SESSION['admin_name'];
		if ($data['username']) {
			if (isset($_POST['password']) && !empty($_POST['password'])) {
				$data['password']=sha1($data['username'].$_POST['password']);
				$user = new user();
				$user_info= $user->getUserByEmail($data['username']);
				if (isset($user_info[0]->username) && !empty($user_info[0]->username)) {
					if ($user_info[0]->password ==$data['password']) {
						if ($user_info[0]->role =="Admin") {
							if ($user_info[0]->status == "Active") {
							 	$Transaction = new transaction();
					          	$transaction = $Transaction->getTransactionById((int)$_POST['transaction_id']);
					          	$transaction = $transaction[0];
					          	if ($transaction) {
									setFlash('transaction?id='.$transaction->id.'&act='.substr(md5('Transactions-'.$transaction->id.'-'.$_SESSION['token']),3,15),'','');
			          			}			
							}else{
								setFlash('../login','error','This account is not active. Do contact Adminstration.');
							}
						}else{
							setFlash('../login','error','You are not allowed to logged in Here.');
						}

					}else{
						setFlash('../login','error','Password doesnot matched.');
					}
				}
				debugger($_SESSION);
				setFlash('../login','error','Email Doesnot Matched.');
			}else{
				setFlash('../login','error','Password Required.');
			}
		}
	}else{
		setFlash('../login','error','Username Required');
	}
}else{
	setFlash('../login','error','Unauthorized Access');
}