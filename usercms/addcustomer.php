<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include 'inc/checklogin.php';
    if (isset($_GET) && !empty($_GET)) {
        $Customer_id = (int)$_GET['id'];
        if ($Customer_id) {
            $pass = substr(md5('Customer-Edit'.$_SESSION['token'].'id='.$Customer_id), 3,15);
            if($pass == $_GET['act']){
                $Customer = new customer();
                $customer = $Customer->getCustomerById($Customer_id);
                if ($customer) {
                    $customer = $customer[0];
                }else{
                    setFlash('./customer','error','Data not found');
                }
            }else{
                setFlash('./login','error','Unauthorized access or Invalid Action');
            }
        }else{
            setFlash('./customer','error','Invalid ID');
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
                                    <div>Customer
                                        <div class="page-title-subheading">Create Customer
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
                                            <div class="card-body"><h5 class="card-title">Add Customer Info</h5>
                                                <form class="" method="post" action="process/customer">
                                                   <!--  <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="exampleEmail11" class="">Email</label>
                                                                <input name="email" id="exampleEmail11" placeholder="with a placeholder" type="email" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="examplePassword11" class="">Password</label>
                                                                <input name="password" id="examplePassword11" placeholder="password placeholder" type="password"class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="">Name</label>
                                                        <input name="name" id="name" placeholder="Customer Name" type="text" class="form-control" required="required" value="<?php echo((isset($customer->name) && !empty($customer->name))?$customer->name:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="contact" class="">contact</label>
                                                        <input name="contact" id="contact" placeholder="Customer contact" type="text" class="form-control" value="<?php echo((isset($customer->contact) && !empty($customer->contact))?$customer->contact:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="address" class="">Address</label>
                                                        <input name="address" id="address" placeholder="Customer Address" type="text" class="form-control" value="<?php echo((isset($customer->address) && !empty($customer->address))?$customer->address:'') ?>">
                                                    </div>
                                                    <div class="position-relative form-group" style="display: none;">
                                                        <input name="id" id="id" placeholder="Customer Address" type="text" class="form-control" value="<?php echo((isset($customer->id) && !empty($customer->id))?$customer->id:'') ?>">
                                                    </div>
                                                    <!-- <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="exampleCity" class="">City</label>
                                                                <input name="city" id="exampleCity" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="exampleState" type="text" class="form-control"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input name="zip" id="exampleZip" type="text" class="form-control"></div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="position-relative form-check">
                                                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                                        <label for="exampleCheck" class="form-check-label">Check me out</label>
                                                    </div> -->
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

            






