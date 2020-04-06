<?php 
$header = "User";
include_once 'inc/header.php'; 
include_once 'inc/checklogin.php';
?>
    <div class="container body">
      <div class="main_container">
        <?php include 'inc/sidebar.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>User List</h3>
              </div>
              <div class="title_right">
                <a href="javascript:;" class="btn btn-success pull-right" onclick="showadduser();">Add User</a>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-bordered table-hover jambo_table">
                      <thead>
                        <th>S.N</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $user = new user();
                          $allUser = $user->getallUser([]);
                          if ($allUser) {
                            foreach ($allUser as $key => $user) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->role; ?></td>
                            <td style="font-size: 20px;">
                              <?php 
                                $act = substr(md5('User-'.$user->id.'-'.$_SESSION['token']),3,15);
                              ?> 
                              <a href="process/user?id=<?php echo $user->id; ?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" onclick="return confirm('Are You sure you want to delete this user?');">
                                  <i class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                          <?php
                            }
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /user content -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
              </div>
              <form action="process/user" class="form form-horizontal" method="post">
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">Username</label>
                    <div class="col-md-6">
                      <input type="text" name="username" id="username" required="required" placeholder=" Username" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">Email</label>
                    <div class="col-md-6">
                      <input type="email" name="email" id="email" required="required" placeholder=" Email of User" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">Password</label>
                    <div class="col-md-6">
                      <input type="password" name="password" id="password" required="required" placeholder=" Password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-2">Role</label>
                    <div class="col-md-6">
                      <select name="role" id="role" class="form-control">
                        <option value="">--Select the Type--</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff" selected="selected">Staff</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" id="user_id">
                  <input type="hidden" name="old_image" id="old_image">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>

            </div>
          </div>
        </div>
<?php include_once 'inc/footer.php'; ?>
<script src="<?php echo JS_PATH; ?>datatables.min.js"></script>
<script>
  function showadduser(){
    $('#myModalLabel').html('Add User');
    $('#username').val('');
    $('#email').val('');
    $('#password').val('');
    $('#role').val('');
    showform();
  }
  function showform(){
    $('.modal').modal();
  }
</script>
