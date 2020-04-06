<?php 
class user extends database{
	function __construct(){
		database::__construct();
		$this->table('users');
	}
	public function addUser($data,$is_die=false){
		return $this->adddata($data,$is_die);
	}
	public function getUserByEmail($username,$is_die=false){
		$args = array(
			// 'fields'=>array('username','email','password','role','status'),
			// 'fields'=>"username, email, password, role, status"
			'where'=>array(
				'and'=>array('username'=>$username)
				// 'and'=>array('status'=>'Active','role'=>'Admin'),
			)
			// 'where' => "email = '".$username."'"
		);
		$data = $this->selectdata($args,$is_die);
		return $data;
	}
	public function getallUser($args=array(),$is_die=false){
		return $this->selectdata($args,$is_die);
	}
	public function updateUser($data, $userid, $is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('id'=>$userid)
			)
		);
		return $this->updatedata($data,$args,$is_die);
	}
	public function getUserByToken($token,$is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('session_token'=>$token)
			)
		);
		$data = $this->selectdata($args,$is_die);
		return $data;
	}
	public function getUserByPasswordResetToken($token,$is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('password_reset_token'=>$token),
			)
		);
		$data = $this->selectdata($args,$is_die);
		return $data;
	}
	public function getAllVendor($is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array(
					'role'=>"Vendor",
					'status' =>'Active'
				)
			)
		);
		$data = $this->selectdata($args,$is_die);
		return $data;
	}
		public function getUserById($id,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function deleteUserbyId($id,$is_die =false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->deletedata($args,$is_die);
	}
}