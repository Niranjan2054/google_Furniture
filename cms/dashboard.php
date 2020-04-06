<?php 
$header = "Dashboard";
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
                <h3>Dashboard</h3>
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
                    <h2>Chart and Diagram</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-6">
                        <canvas id="linechart"></canvas>
                      </div>
                      <div class="col-md-6">
                         <canvas id="bardiagram"></canvas>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include_once 'inc/footer.php'; ?>
<script>
  var ctx = document.getElementById('linechart').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
              label: 'My First dataset',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [0, 10, 5, 2, 20, 30, 45]
          }]
      },

      // Configuration options go here
      options: {}
  });

  var ctx = document.getElementById('bardiagram').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',

      // The data for our dataset
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
              label: 'My Second dataset',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [90, 10, 5, 2, 20, 30, 45]
          }]
      },

      // Configuration options go here
      options: {}
  });
</script>
<script src="<?php echo JS_PATH; ?>datatables.min.js"></script>

