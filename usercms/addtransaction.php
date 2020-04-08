<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include 'inc/checklogin.php';
    include 'inc/getUser.php';
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
                                    <div>Transaction
                                        <div class="page-title-subheading">Purchase or Sales Transaction of:
                                        </div>
                                        <?php 
                                            if ($customer) {
                                        ?>
                                        <div class="page-title-subheading">
                                            <h6>Account no: <?php echo $customer->id; ?></h4>
                                            <h5><?php echo $customer->name; ?></h3>
                                            <h6>Address: <?php echo $customer->address; ?></h4>
                                        </div>
                                        <?php
                                            flashMessage();
                                            }
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <!-- Title Wrapper Ends           -->
                        <div class="row">
                            <div class="app-main__inner">
                                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                            <span>Purchase</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                            <span>Sale</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Purchases</h5>
                                                <form method="post" action="process/transaction">
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="exampleAddress" class="">Furniture</label>
                                                        <select name="furniture_id" id="" class="form-control">
                                                            <option value="" disabled="" selected="">--Select Furniture--</option>
                                                        <?php 
                                                            $Furniture = new furniture();
                                                            $furnitures = $Furniture->getallFurniture();
                                                            if ($furnitures) {
                                                                foreach ($furnitures as $key => $furniture) {
                                                        ?>
                                                            <option value="<?php echo $furniture->id ?>"><?php echo $furniture->furniturename; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                         ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="" class="form-check-label">no. of piece</label>
                                                        <input name="no_of_piece" id="no_of_piece" type="number" class="form-control" min="0">
                                                    </div>

                                                    <div class="position-relative form-check">
                                                        <input name="accountType" id="accountType" type="radio" class="" value="debit">
                                                        <label for="" class="">Debit</label>
                                                        <input name="accountType" id="accountType" type="radio" class="" value="credit">
                                                        <label for="" class="">Credit</label>
                                                    </div>
                                                     <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="type" id="type" value="purchase" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="customer_id" id="customer_id" value="<?php echo $customer->id ?>" type="text" >
                                                    </div>
                                                    <button class="mt-2 btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Sales</h5>
                                                <form method="post" action="process/transaction">
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="exampleAddress" class="">Furniture</label>
                                                        <select name="furniture_id" id="" class="form-control">
                                                            <option value="" disabled="" selected="">--Select Furniture--</option>
                                                        <?php 
                                                            $Furniture = new furniture();
                                                            $furnitures = $Furniture->getallFurniture();
                                                            if ($furnitures) {
                                                                foreach ($furnitures as $key => $furniture) {
                                                        ?>
                                                            <option value="<?php echo $furniture->id ?>"><?php echo $furniture->furniturename; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                         ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="" class="form-check-label">no. of piece</label>
                                                        <input name="no_of_piece" id="no_of_piece" type="number" class="form-control" min="0">
                                                    </div>

                                                    <div class="position-relative form-check">
                                                        <input name="accountType" id="accountType" type="radio" class="" value="debit">
                                                        <label for="" class="">Debit</label>
                                                        <input name="accountType" id="accountType" type="radio" class="" value="credit">
                                                        <label for="" class="">Credit</label>
                                                    </div>
                                                     <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="type" id="type" value="sale" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="customer_id" id="customer_id" value="<?php echo $customer->id ?>" type="text" >
                                                    </div>
                                                    <button class="mt-2 btn btn-primary">Submit</button>
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
