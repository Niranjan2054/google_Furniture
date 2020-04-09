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
                                    <div class="page-title-actions">
                                        <div class="d-inline-block dropdown">
                                        <a href="transaction?id=<?php echo $Customer_id ?>&amp;act=<?php echo $_GET['act'] ?>" type="button" class="btn-shadow  btn btn-info">
                                            View Transaction
                                        </a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>  

                        <!-- Title Wrapper Ends           -->
                        <div class="row">
                            <div class="app-main__inner">
                                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'active':'') ?>" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                            <span>Purchase</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'':'active') ?>" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                            <span>Sale</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'show':'') ?> <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'active':'') ?>" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Purchases</h5>
                                                <form method="post" action="process/transaction">
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="">Date</label>
                                                        <input type="text" name="transaction_date" class="form-control" data-toggle="datepicker-month" value="<?php echo ((isset($transaction_info->transaction_date) && !empty($transaction_info->transaction_date))?$transaction_info->transaction_date:'') ?>" />
                                                    </div>
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
                                                            <option value="<?php echo $furniture->id ?> " <?php echo ((isset($transaction_info->furniture_id ) && !empty($transaction_info->furniture_id ) && $transaction_info->furniture_id == $furniture->id)?'selected':''); ?>><?php echo $furniture->furniturename; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                         ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="" class="form-check-label">no. of piece</label>
                                                        <input name="no_of_piece" id="no_of_piece" type="number" class="form-control" min="0" value="<?php echo((isset($transaction_info->no_of_piece) && !empty($transaction_info->no_of_piece))?$transaction_info->no_of_piece:'') ?>">
                                                    </div>

                                                    <div class="position-relative form-check">
                                                        <input name="accountType" id="accountType" type="radio" class="" value="debit" <?php echo((isset($transaction_info->accountType) && !empty($transaction_info->accountType) && $transaction_info->accountType == 'Debit')?'checked':'') ?>>
                                                        <label for="" class="">Debit</label>
                                                        <input name="accountType" id="accountType" type="radio" class="" value="credit" <?php echo((isset($transaction_info->accountType) && !empty($transaction_info->accountType) && $transaction_info->accountType == 'Credit')?'checked':'') ?>>
                                                        <label for="" class="">Credit</label>
                                                    </div>
                                                     <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="type" id="type" value="purchase" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="customer_id" id="customer_id" value="<?php echo $customer->id ?>" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="id" id="id" value="<?php echo ((isset($transaction_info->id) && !empty($transaction_info->id))?$transaction_info->id:'') ?>" type="text" >
                                                    </div>
                                                    <button class="mt-2 btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tabs-animation fade <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'':'show') ?> <?php echo(((isset($transaction_info->type) && !empty($transaction_info->type) && $transaction_info->type=='purchase') ||  (!isset($transaction_info->type) || empty($transaction_info->type)))?'':'active') ?>" id="tab-content-1" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Sales</h5>
                                                <form method="post" action="process/transaction">
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="">Date</label>
                                                        <input type="text" name="transaction_date" class="form-control" data-toggle="datepicker-month" value="<?php echo ((isset($transaction_info->transaction_date) && !empty($transaction_info->transaction_date))?$transaction_info->transaction_date:'') ?>" />
                                                    </div>
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
                                                            <option value="<?php echo $furniture->id ?>" <?php echo ((isset($transaction_info->furniture_id ) && !empty($transaction_info->furniture_id ) && $transaction_info->furniture_id == $furniture->id)?'selected':''); ?>><?php echo $furniture->furniturename; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                         ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="position-relative form-group col-md-6">
                                                        <label for="" class="form-check-label">no. of piece</label>
                                                        <input name="no_of_piece" id="no_of_piece" type="number" class="form-control" min="0" value="<?php echo((isset($transaction_info->no_of_piece) && !empty($transaction_info->no_of_piece))?$transaction_info->no_of_piece:'') ?>">
                                                    </div>

                                                    <div class="position-relative form-check">
                                                        <input name="accountType" id="accountType" type="radio" class="" value="debit" <?php echo((isset($transaction_info->accountType) && !empty($transaction_info->accountType) && $transaction_info->accountType == 'Debit')?'checked':'') ?>>
                                                        <label for="" class="">Debit</label>
                                                        <input name="accountType" id="accountType" type="radio" class="" value="credit" <?php echo((isset($transaction_info->accountType) && !empty($transaction_info->accountType) && $transaction_info->accountType == 'Credit')?'checked':'') ?>>
                                                        <label for="" class="">Credit</label>
                                                    </div>
                                                     <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="type" id="type" value="sale" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="customer_id" id="customer_id" value="<?php echo $customer->id ?>" type="text" >
                                                    </div>
                                                    <div class="position-relative form-group col-md-6" style="display: none;">
                                                        <input name="id" id="id" value="<?php echo ((isset($transaction_info->id) && !empty($transaction_info->id))?$transaction_info->id:'') ?>" type="text" >
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
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.87c0748b313a1dda75f5.js"></script>
