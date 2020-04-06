<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<!-- Main Body -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <!-- Title Wrapper -->
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>
                                      Password Change
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <!-- Title Wrapper Ends           -->
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Password Change</h2>
                              
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="process/password-change" method="post" class="form form-horizontal">
                                  <div class="form-group row">
                                    <label for="" class="col-md-2 col-lg-2">Old Password</label>
                                    <div class="col-md-6 col-lg-6">
                                      <input type="password" placeholder=" Password" name="oldpassword" id="oldpassword" required class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="" class="col-md-2 col-lg-2">New Password</label>
                                    <div class="col-md-6 col-lg-6">
                                      <input type="password" placeholder=" New Password" name="password" id="password" required class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="" class="col-md-2 col-lg-2">Old Password</label>
                                    <div class="col-md-6 col-lg-6">
                                      <input type="password" placeholder=" Re-Enter New Password" name="newpassword" id="newpassword" required class="form-control">
                                    </div>
                                    <span id="err_pass" class="hidden"></span>
                                  </div>
                                  <div class="form-group row">
                                    <label for="" class="col-md-2 col-lg-2"></label>
                                    <div class="col-md-6 col-lg-6">
                                      <button type="reset" class="btn btn-primary">Clear</button>
                                      <button type="submit" class="btn btn-success" id="submit"><i class="fa fa-send"> Submit</i></button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
<?php include 'inc/footer.php'; ?>




<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Password Change</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="process/password-change" method="post" class="form form-horizontal">
                        <div class="form-group row">
                          <label for="" class="col-md-2 col-lg-2">Old Password</label>
                          <div class="col-md-6 col-lg-6">
                            <input type="password" placeholder=" Password" name="oldpassword" id="oldpassword" required class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-2 col-lg-2">New Password</label>
                          <div class="col-md-6 col-lg-6">
                            <input type="password" placeholder=" New Password" name="password" id="password" required class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-2 col-lg-2">Old Password</label>
                          <div class="col-md-6 col-lg-6">
                            <input type="password" placeholder=" Re-Enter New Password" name="newpassword" id="newpassword" required class="form-control">
                          </div>
                          <span id="err_pass" class="hidden"></span>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-2 col-lg-2"></label>
                          <div class="col-md-6 col-lg-6">
                            <button type="reset" class="btn btn-primary">Clear</button>
                            <button type="submit" class="btn btn-success" id="submit"><i class="fa fa-send"> Submit</i></button>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>