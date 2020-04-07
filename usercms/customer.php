<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include 'inc/checklogin.php';
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
                                        <div class="page-title-subheading">Create, Edit and Delete Customer. Add some transaction here.
                                        </div>
                                    </div>
                                </div>

                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <a href="addcustomer" type="button" class="btn-shadow  btn btn-info">
                                            Add Customer
                                        </a>
                                    </div>
                                </div>    
                            </div>
                        </div>  

                        <!-- Title Wrapper Ends           -->
                        <div class="row">
                            <div class="app-main__inner">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Account no.</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Transaction</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $Customer = new customer();
                                                    $customers = $Customer->getallCustomer(['order'=>'ASC']);
                                                    // debugger($customers);
                                                    foreach ($customers as $key => $customer) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $customer->id; ?></td>
                                                    <td><?php echo $customer->name; ?></td>
                                                    <td><?php echo $customer->contact; ?></td>
                                                    <td><?php echo $customer->address; ?></td>
                                                    <td><a href="javascript:;" class="btn btn-shadow btn-primary">Transaction</a></td>
                                                    <td>
                                                        <a href="addcustomer?id=<?php echo $customer->id ?>&amp;act=<?php  echo(substr(md5('Customer-Edit'.$_SESSION['token'].'id='.$customer->id), 3,15))?> " class="btn btn-shadow btn-secondary">
                                                            Edit
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-shadow btn-danger">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                 ?>
                                            </tbody>
                                            <tfoot>
                                            <!-- <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr> -->
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php 
    include 'inc/footer.php'
 ?>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.87c0748b313a1dda75f5.js"></script>
