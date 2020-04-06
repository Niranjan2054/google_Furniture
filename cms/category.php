<?php 
$header = "Category";
include_once 'inc/header.php'; 
include_once 'inc/checklogin.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <div class="container body">
      <div class="main_container">
        <?php include 'inc/sidebar.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Category</h3>
              </div>
               <div class="title_right">
                <a href="javascript:;" class="btn btn-success pull-right" onclick="showaddcategory();">Add Category</a>
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
                    <h2>Category List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                       <table id="datatable" class="table table-bordered table-hover jambo_table">
                      <thead>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>isParent</th>
                        <th>Parent Id</th>
                        <th>Show in Menu</th>
                        <th>Added By</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $category = new category();
                          $allCategory = $category->getallCategory([]);
                          // debugger($allCategory);
                          // debugger($_SESSION);
                          if ($allCategory) {
                            foreach ($allCategory as $key => $category) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
          
                            <td><?php echo $category->name; ?></td>
                            <td><?php echo $category->isparent; ?></td>
                            <td><?php echo (isset($category->parentName) && !empty($category->parentName))?$category->parentName:'None'; ?></td>
                            <td><?php echo $category->show_in_menu; ?></td>
                            <td><?php echo $category->added_by; ?></td>
                            <td style="font-size: 20px;">
                              <a href="javascript:;" class="btn btn-primary" onclick="showeditcategory(this);" data-category_data='<?php echo json_encode($category); ?>'>
                                <i class="fa fa-pencil"></i>
                              </a> 
                              
                              <?php 
                                $act = substr(md5('Category-'.$category->id.'-'.$_SESSION['token']),3,15);
                              ?> 
                              <a href="process/category?id=<?php echo $category->id; ?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" onclick="return confirm('Are You sure you want to delete this category?');">
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
        </div>
        <!-- /page content -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Category</h4>
              </div>
              <form action="process/category" class="form form-horizontal" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">Name</label>
                    <div class="col-md-6">
                      <input type="text" name="name" id="name" placeholder=" Category Name" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">isParent</label>
                    <div class="col-md-6">
                      <input type="radio" name="isparent" value="parent" onclick="hideParent()" checked> Parent 
                      <input type="radio" name="isparent" value="child" onclick="showParent()"> Child 
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="" class="col-md-2 col-lg-2">Show in Menu</label>
                    <div class="col-md-6">
                      <input type="radio" name="show_in_menu" value="show" checked> Show
                      <input type="radio" name="show_in_menu" value="hide"> Hide
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-group row hidden" id="parentCategories">
                    <label for="" class="col-md-2 col-lg-2">Parent</label>
                    <div class="col-md-6">
                      <?php 
                        $category = new category();
                        $parentCategories = $category->getparentcategory();
                        // debugger($parentCategories,true);
                      ?>
                      <select name="parentId" id="parentId" class="form-control">
                        <option value="" disabled="disabled" selected="selected">---Choose Parent---</option>
                        <?php
                          if (isset($parentCategories) && !empty($parentCategories)) {
                            foreach ($parentCategories as $key => $parentCategory) {
                        ?>
                              <option value="<?php echo($parentCategory->id) ?>"><?php echo $parentCategory->name; ?></option>
                        <?php
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" id="category_id">
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
  function showeditcategory(element){
    var category_info = $(element).data('category_data');
    console.log((category_info));
    if(typeof(category_info) != 'object'){
      category_info = JSON.parse('category_info');
    }
    $('#myModalLabel').html('Edit Category');
    $('#name').val(category_info.name);
    $("input[name=isparent][value=" + category_info.isparent + "]").attr('checked', 'checked');
    $("input[name=show_in_menu][value=" + category_info.show_in_menu + "]").attr('checked', 'checked');
    if (category_info.isparent=='child') {
      showParent();
      $("[name=parentId]").val(category_info.parentId);
    }else{
      hideParent();
    }
    $('#category_id').val(category_info.id);
    showform();
  }

  function showaddcategory(){
    $('#myModalLabel').html('Add Category');
    $('#name').val('');
    $('#isparent').val('');
    $('#parentId').val('');
    $('#added_by').val('');
    $('#show_in_menu').val('');

    $('#status').val('Active');
    showform();
  }
  function showform(){
    $('.modal').modal();
  }
  function showParent(){
    $('#parentCategories').removeClass('hidden');
  }
  function hideParent(){
    $('#parentCategories').addClass('hidden');
  }
</script>