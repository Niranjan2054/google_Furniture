<?php 
class transaction extends database{
	function __construct(){
		database::__construct();
		$this->table('transactions');
	}
	public function addTransactions($data,$is_die=false){
		return $this->adddata($data,$is_die);
	}
	
	public function getallTransaction($args=array(),$is_die=false){
		return $this->selectdata($args,$is_die);
	}
	public function updateTransaction($data, $transactionid, $is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('id'=>$transactionid)
			)
		);
		return $this->updatedata($data,$args,$is_die);
	}
	public function getTransactionById($id,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function deleteTransactionbyId($id,$is_die =false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->deletedata($args,$is_die);
	}
	public function getTransactionByCutomerId($customer_id,$is_die = false){
		$args = array(
			'fields' => array(
				'(SELECT name FROM customers WHERE id = customer_id) as customername',
				'(SELECT furniturename from furnitures WHERE id = furniture_id) as furniturename',
				'(SELECT saleprice from furnitures WHERE id = furniture_id) as saleprice',
				'(SELECT purchaseprice from furnitures WHERE id = furniture_id) as purchaseprice',
				'no_of_piece',
				'accountType',
				'type',
				'transaction_date',
			),
			'where' =>array(
					'and' => array(
						'customer_id' => $customer_id
					)
				)
		);
		return $this->selectdata($args,$is_die);
	}
}

