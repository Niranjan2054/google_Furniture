<?php 
class customer extends database{
	function __construct(){
		database::__construct();
		$this->table('customers');
	}
	public function addCustomers($data,$is_die=false){
		return $this->adddata($data,$is_die);
	}
	
	public function getallCustomer($args=array(),$is_die=false){
		return $this->selectdata($args,$is_die);
	}
	public function updateCustomer($data, $customerid, $is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('id'=>$customerid)
			)
		);
		return $this->updatedata($data,$args,$is_die);
	}
	public function getCustomerById($id,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function deleteCustomerbyId($id,$is_die =false){
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