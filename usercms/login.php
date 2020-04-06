<?php 
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
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
        <input type="checkbox" name="remember"> keep me sign in
        <input type="submit" class="btn" value="Sign in">
      </div>
      </form>
  </body>
</html>
