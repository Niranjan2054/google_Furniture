<?php 
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    if (isset($_SESSION['token']) && !empty($_SESSION['token']) || isset($_COOKIE['_auth_user'])) {
      setFlash('index','success','You are already logged in.');
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
          <input type="text" placeholder="Username" name="username">
        </div>

        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password">
        </div>
        <input type="checkbox" name="remember"> keep me sign in <br><br>
        <input type="submit" class="btn" value="Sign in">
        <a href="reset-password" style="color: white">Forgot Password?</a>
      </div>
      </form>
  </body>
</html>
