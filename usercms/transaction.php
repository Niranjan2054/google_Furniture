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
                                        <div class="page-title-subheading">Create, Edit and Delete Transaction.
                                        </div>
                                        <?php 
                                            flashMessage();
                                         ?>
                                    </div>
                                </div>

                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <a href="addtransaction?id=<?php echo $customer->id ?>&amp;act=<?php  echo(substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$customer->id), 3,15))?> " type="button" class="btn-shadow  btn btn-info">
                                            Add Transaction
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
                                                <th>S.N</th>
                                                <th>Customer name</th>
                                                <th>Furniture name</th>
                                                <th>Account Type</th>
                                                <th>Transaction Date</th>
                                                <th>Type</th>
                                                <th>no. of piece</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $Transaction = new transaction();
                                                    $transactions = $Transaction->getTransactionByCutomerId($customer->id);
                                                    if ($transactions) {
                                                        foreach ($transactions as $key => $transaction) {
                                                            if ($transaction->type == 'sale') {
                                                                $price = $transaction->saleprice;
                                                            }else{
                                                                $price = $transaction->purchaseprice;
                                                            }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $transaction->customername; ?></td>
                                                        <td><?php echo $transaction->furniturename; ?></td>
                                                        <td><?php echo $transaction->accountType; ?></td>
                                                        <td><?php echo $transaction->transaction_date; ?></td>
                                                        <td><?php echo $transaction->type; ?></td>
                                                        <td><?php echo $transaction->no_of_piece; ?></td>
                                                        <td><?php echo $price; ?></td>
                                                        <td><?php echo $price*$transaction->no_of_piece; ?></td>
                                                        <td>
                                                            <a href="addtransaction?id=<?php echo $customer->id ?>&amp;act=<?php  echo(substr(md5('Add-Transaction'.$_SESSION['token'].'id='.$customer->id), 3,15))?>&amp;transaction_id=<?php echo $transaction->id ?>" class="btn btn-shadow btn-secondary">
                                                                Edit
                                                            </a>
                                                            <a href="login?id=<?php echo $transaction->id ?>&amp;act=<?php  echo(substr(md5('Delete-Transactions-'.$transaction->id.'-'.$_SESSION['token']),3,15))?>&amp;dir=transaction" class="btn btn-shadow btn-danger">
                                                                Delete
                                                            </a>
                                                        </td>
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
