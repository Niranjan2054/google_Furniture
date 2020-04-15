<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include 'inc/checklogin.php';
    include 'inc/getUser.php'
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
                                        <div class="page-title-subheading">Transaction Report of.
                                        </div>
                                        <div class="page-title-subheading">
                                            <h6>Account no: <?php echo $customer->id; ?></h4>
                                            <h5><?php echo $customer->name; ?></h3>
                                            <h6>Address: <?php echo $customer->address; ?></h4>
                                        </div>
                                        <?php 
                                            flashMessage();
                                         ?>
                                    </div>
                                </div>

                                <div class="page-title-actions">
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
                                                <th>S.N</th>
                                                <th>Nepali Date</th>
                                                <th>English Date</th>
                                                <th>Description</th>
                                                <th>Purchase Price</th>
                                                <th>Sale Price</th>
                                                <th>Profit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($transactions) {
                                                        $totabalance =0;
                                                        $converter = new nepali_calendar();
                                                        foreach ($transactions as $key => $transaction) {
                                                            if ($transaction->type == 'purchase') {
                                                                continue;
                                                            }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key +1; ?></td>
                                                        <td><?php echo $converter->English_to_Nepali($transaction->transaction_date); ?></td>
                                                        <td><?php echo $transaction->transaction_date; ?></td>
                                                        <td><?php echo $transaction->furniturename; ?></td>
                                                        <td><?php echo $transaction->no_of_piece * $transaction->purchaseprice; ?></td>
                                                        <td><?php echo $transaction->no_of_piece * $transaction->saleprice; ?></td>
                                                        <td><?php echo $transaction->no_of_piece * ($transaction->saleprice - $transaction->purchaseprice); ?></td>
                                                    </tr>
                                                    <?php
                                                        }
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
v