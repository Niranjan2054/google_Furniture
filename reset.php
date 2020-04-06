<?php 
require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
include_once 'cms/inc/header.php'; 
$user = new user();
if (isset($_GET) && isset($_GET['token']) && !empty($_GET['token'])) {
	$token = sanitize($_GET['token']);
	$user_info = $user->getUserByPasswordResetToken($token);
	// debugger($_GET,true);
    if (!isset($user_info) || empty($user_info)) {
     	setFlash('cms/reset-password','error','Invalid Reset Token. Please send mail again.');
    }else{
		// debugger($_GET,true);
    	$_SESSION['password_reset_token'] = $token;
    	$_SESSION['password_reset_id'] = $user_info[0]->id;
    }
    ?>
     


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="usercms/style.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>bootstrap.css">
  </head>
  <body>
    <div class="login-box">
      <h1>Password Change</h1>
      <form action="process/reset" method="post">
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="text" placeholder="Password" name="password">
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="text" placeholder="Re-Enter Password" name="new-password">
        </div>
        <input type="submit" class="btn" value="Change Password">
      </div>
      </form>
  </body>
</html>
    <?php

}else{
	setFlash('cms/reset-password','error','Reset Token Required for Password Change.');
}
?>
<script type="text/javascript">
	$('#newpassword').keyup(function(){
		var password = $('#password').val();
		var newpassword = $('#newpassword').val();
		console.log('check');
		if (password != newpassword) {
			$('#err_pass').html("Password Doesn't match.").removeClass('hidden').addClass('alert').addClass('alert-danger');
			$("#button").attr('disabled','disabled').addClass('hidden');
		}else{
			$('#err_pass').html("").addClass('hidden').removeClass('alert').removeClass('alert-danger');
			$("#button").removeAttr('disabled','disabled').removeClass('hidden');
		}
	});
</script>


