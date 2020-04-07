<?php 
class furniture extends database{
	function __construct(){
		database::__construct();
		$this->table('furnitures');
	}
	public function addFurnitures($data,$is_die=false){
		return $this->adddata($data,$is_die);
	}
	
	public function getallFurniture($args=array(),$is_die=false){
		return $this->selectdata($args,$is_die);
	}
	public function updateFurniture($data, $furnitureid, $is_die=false){
		$args = array(
			'where'=>array(
				'and'=>array('id'=>$furnitureid)
			)
		);
		return $this->updatedata($data,$args,$is_die);
	}
	public function getFurnitureById($id,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function deleteFurniturebyId($id,$is_die =false){
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