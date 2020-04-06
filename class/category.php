<?php 
class category extends database{
	function __construct(){
		database::__construct();
		$this->table('categories');
	}
	public function addCategory($data,$is_die=false){
		return $this->adddata($data,$is_die);
	}
	public function getallCategory($args=array(),$is_die=false){
		$args = array(
			'fields'  => array(
					'id','name','show_in_menu','isparent','status','(SELECT username FROM users as c WHERE c.id = categories.added_by) as added_by','(SELECT name FROM categories as c WHERE c.id = categories.parentId) as parentName','parentId'
			)
		);
		return $this->selectdata($args,$is_die);
	}
	public function getCategoryById($id,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function getparentcategory($is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'isparent' => 'parent',
						'parentId' => 0
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function getchildcategorybyparentid($parentId,$is_die=false){
		$args = array(
			'where' =>array(
					'and' => array(
						'isparent' => 0,
						'parentId' => $parentId
					)
				)
			);
		return $this->selectdata($args,$is_die);
	}
	public function deleteCategorybyId($id,$is_die =false){
		$args = array(
			'where' =>array(
					'and' => array(
						'id' => $id
					)
				)
			);
		return $this->deletedata($args,$is_die);
	}
	public function updatecategory($data,$id,$is_die=false){
		$args = array(
					'where'	=> array(
						'and' => array(
							'id' => $id
						)
					)
				);
	return $this->updatedata($data,$args,$is_die);
	}

}