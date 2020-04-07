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
                                    <div>Furniture
                                        <div class="page-title-subheading">Create, Edit and Delete Furniture.
                                        </div>
                                        <?php 
                                            flashMessage();
                                         ?>
                                    </div>
                                </div>

                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <a href="addfurniture" type="button" class="btn-shadow  btn btn-info">
                                            Add Furniture
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
                                                <th>Name</th>
                                                <th>Purchase Price</th>
                                                <th>Sale Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $Furniture = new furniture();
                                                    $furnitures = $Furniture->getallFurniture(['order'=>'ASC']);
                                                    if ($furnitures) {
                                                        foreach ($furnitures as $key => $furniture) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $furniture->name; ?></td>
                                                        <td><?php echo $furniture->purchaseprice; ?></td>
                                                        <td><?php echo $furniture->saleprice; ?></td>
                                                        <td>
                                                            <a href="addfurniture?id=<?php echo $furniture->id ?>&amp;act=<?php  echo(substr(md5('Furniture-Edit'.$_SESSION['token'].'id='.$furniture->id), 3,15))?> " class="btn btn-shadow btn-secondary">
                                                                Edit
                                                            </a>
                                                            <a href="process/furniture?id=<?php echo $furniture->id ?>&amp;act=<?php  echo(substr(md5('Furnitures-'.$furniture->id.'-'.$_SESSION['token']),3,15))?> " class="btn btn-shadow btn-danger">
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
