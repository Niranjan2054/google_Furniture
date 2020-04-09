<?php 
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    if (isset($_SESSION['token']) && !empty($_SESSION['token']) || isset($_COOKIE['_auth_user'])) {
      if (isset($_GET) && !empty($_GET)) {
        $data  = array(
          'id' => (int)$_GET['id'], 
          'act' => sanitize($_GET['act']), 
          'dir' => sanitize($_GET['dir']), 
        );
        $act = substr(md5('Delete-Transactions-'.$data['id'].'-'.$_SESSION['token']),3,15);
        if ($act ==$data['act']) {
          $Transaction = new transaction();
          $transaction = $Transaction->getTransactionById($data['id']);
          $transaction = $transaction[0];
          // debugger($transaction,true);
        }
      }else{
        setFlash('index','success','You are already logged in.');
      }
    }  
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>bootstrap.css">
  </head>
  <body>
    <div class="login-box">
      <h1>Login </h1>
      <h3 style="color: #fff">
        <?php flashMessage(); ?>
      </h3>
      <form action="process/login" method="post">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" name="username" value="<?php echo(isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])?$_SESSION['admin_name']:'') ?>" <?php echo(isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])?"disabled":'') ?>>
        </div>

        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password">
        </div>

        <div class="textbox" style="display: none;">
          <i class="fas fa-lock"></i>
          <input type="number" name="transaction_id" value="<?php echo(isset($transaction->id) && !empty($transaction->id)?$transaction->id:'') ?>">
        </div>

          <?php echo(isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])?"":'<input type="checkbox" name="remember"> keep me sign in <br><br>') ?>
        <input type="submit" class="btn" value="Sign in">
        <?php echo(isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])?"":'<a href="reset-password" style="color: white">Forgot Password?</a>' )?>
      </div>
      </form>
  </body>
</html>
