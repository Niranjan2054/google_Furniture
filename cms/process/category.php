<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	// debugger($_POST,true);
	$category = new category();
	if (isset($_POST) && !empty($_POST)) {
		$data = array(
					'name'	=> sanitize($_POST['name']),
					'isparent' => sanitize($_POST['isparent']),
					'show_in_menu' => sanitize($_POST['show_in_menu']),
					'parentId' =>(isset($_POST['parentId']) && !empty($_POST['parentId']))?$_POST['parentId']:0,
					'added_by' => $_SESSION['user_id']
				);
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$category_id = $_POST['id'];
		}
		if (isset($category_id) && !empty($category_id)) {
			$act = 'updat';
			$categorys = $category->updatecategory($data,(int)$_POST['id']);
		}else{
			$act = "add";
			$categorys = $category->addCategory($data);
		}
		if ($categorys) {
			setFlash('../category','success','Category '.$act.'ed Successfully');
		}else{
			setFlash('../category','error','Error While Adding To Database');
		}
	}else if(isset($_GET) && !empty($_GET)){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']>0) {
			$act = substr(md5('Category-'.$_GET['id'].'-'.$_SESSION['token']),3,15);
			if (isset($_GET['act']) && !empty($_GET['act']) && $act == $_GET['act']) {
				$category_id = (int)$_GET['id'];
				$Category_info = $category->getCategoryById($category_id);
				if ($Category_info) {
					$success = $category->deleteCategorybyId($Category_info[0]->id);
					if ($success) {
						setFlash('../category','success','Category Deleted Successfully');
					}else{
						setFlash('../category','error','Error While Deleting Category');
					}
				}else{
					setFlash('../category','error','Category Not found.');
				}

			}else{
				setFlash('../category','error','Error unknown access to delete');
			}
		}else{
			setFlash('../category','error','Invalid Id.');
		}
	}
	else{
		setFlash('../category','error','Unauthorized Access');
	}
?>