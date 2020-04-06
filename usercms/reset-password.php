<?php 
include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
$header = "Login Admin";
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
      <h1>Reset Form </h1>
      <label for="">Please provide your valid email address to send reset link.</label>
      <form action="process/reset-password" method="post">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" name="username">
        </div>
        <input type="submit" class="btn" value="Send Verification">
        <br>
        <p class="hidden">check mailtrap.io after submission</p>
      </div>
      </form>
  </body>
</html>

