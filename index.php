<?php
session_start();
include_once 'classes/User.php';
include_once 'classes/Session.php';

$user = new User();
$session = new Session();

if (isset($_POST['login'])) {
  // code...
  $count = $user->login($_POST['username'] , $_POST['password']);
  if ($count > 0) {
      $current_user = $user->get_current_user($_POST['username'] , $_POST['password']);
      $user_id = $current_user['user_id'];
      $session->put_session($user_id);
      header("location:add_task.php");
    exit();
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css"/>
    <title>login</title>
</head>
<body>
    <!-- Start Login -->
    <div class="container">
       <div class="card" style="width: 400px ; margin: 50px auto">
          <div class="card-header  text-center"> <h3>تسجيل دخول</h3> </div>
          <div class="card-body">
            <form method="post" >
                <input type="text" name="username" class="form-control mb-3" placeholder="اسم المستخدم" />
                <input type="password" name="password" class="form-control mb-3" placeholder="كلمة السر" />
                <input type="submit" name="login" class="form-control mb-3 bg-info text-light" value="دخول" />
             </form>
             <a href="register.php" class="text-center">انشاء حساب جديد</a>
          </div>
       </div>
    </div>
    <!-- End Login -->

 <script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
