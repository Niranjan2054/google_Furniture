<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include 'inc/checklogin.php';
    if (isset($_GET) && !empty($_GET)) {
        $Furniture_id = (int)$_GET['id'];
        if ($Furniture_id) {
            $pass = substr(md5('Furniture-Edit'.$_SESSION['token'].'id='.$Furniture_id), 3,15);
            if($pass == $_GET['act']){
                $Furniture = new furniture();
                $furniture = $Furniture->getFurnitureById($Furniture_id);
                if ($furniture) {
                    $furniture = $furniture[0];
                }else{
                    setFlash('./furniture','error','Data not found');
                }
            }else{
                setFlash('./login','error','Unauthorized access or Invalid Action');
            }
        }else{
            setFlash('./furniture','error','Invalid ID');
        }
    }
 ?>
<!doctype html>
<link href="https://demo.dashboardpack.com/architectui-html-pro/main.87c0748b313a1dda75f5.css" rel="stylesheet">
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <!-- Title Wrapper -->
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                                    </div>
                                    <div>Furniture
                                        <div class="page-title-subheading">Create Furniture
                                        </div>
                                        <?php 
                                            flashMessage();
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <!-- Title Wrapper Ends           -->
                        <div class="row">
                            <div class="app-main__inner">
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Add Furniture Info</h5>
                                                <form class="" method="post" action="process/furniture">
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="">Name</label>
                                                        <input name="furniturename" id="furniturename" placeholder="Furniture Name" type="text" class="form-control" required="required" value="<?php echo((isset($furniture->furniturename) && !empty($furniture->furniturename))?$furniture->furniturename:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="purchaseprice" class="">Purchase Price</label>
                                                        <input name="purchaseprice" id="purchaseprice" placeholder="Furniture Purchase Price" type="text" class="form-control" value="<?php echo((isset($furniture->purchaseprice) && !empty($furniture->purchaseprice))?$furniture->purchaseprice:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="saleprice" class="">Sale Price</label>
                                                        <input name="saleprice" id="saleprice" placeholder="Furniture Sale Price" type="text" class="form-control" value="<?php echo((isset($furniture->saleprice) && !empty($furniture->saleprice))?$furniture->saleprice:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group" style="display: none;">
                                                        <input name="id" id="id" type="text" class="form-control" value="<?php echo((isset($furniture->id) && !empty($furniture->id))?$furniture->id:'') ?>">
                                                    </div>
                                                   
                                                    <button class="mt-2 btn btn-primary" type="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
<?php 
    include 'inc/footer.php'
 ?>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.87c0748b313a1dda75f5.js"></script>

            






