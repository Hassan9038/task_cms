<!DOCTYPE html>
<?php
include_once 'classes/Validation.php';
include_once 'classes/database.php';
include_once 'classes/User.php';
$user = new User();
$validation = new Validation();

if (isset($_POST['register'])) {
  // code...
  $validation->check_input($_POST);

  $errors = $validation->erros();

  if (!$errors) {
      if ($user->check_user_exsit($_POST['username'])) {
          $user_exit = "اسم المستخدم مستخدم مسبقا";
      }else{
        $user->register($_POST['username'] ,$_POST['password'] ,$_POST['email']);
        $success  = "تم التسجيل بنجاح";
        header("location:index.php");
        exit();
      }

  }


}
 ?>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css"/>
    <title>register</title>
</head>
<body>

    <!-- Start Register -->
    <div class="container">
       <div class="card" style="width: 400px ; margin: 50px auto">
          <div class="card-header  text-center"> <h3>انشاء حساب</h3> </div>
          <div class="card-body">
            <?php if (isset($user_exit)): ?>
            <?php echo $user_exit; ?>
            <?php endif; ?>
            <?php if (isset($success)): ?>
              <?php echo $success ?>
            <?php endif; ?>
            <form method="post" >
                <input type="text" name="username" class="form-control mb-3" placeholder="اسم المستخدم" />
                <?php if (isset($errors)): ?>
                  <?php if (!empty($errors['name_err'])): ?>
                    <?php echo $errors['name_err']; ?>
                  <?php endif; ?>
                <?php endif; ?>
                <input type="email" name="email" class="form-control mb-3" placeholder="البريد الالكتروني" />
                <?php if (isset($errors)): ?>
                  <?php if (!empty($errors['email_err'])): ?>
                    <?php echo $errors['email_err']; ?>
                  <?php endif; ?>
                <?php endif; ?>
                <input type="password" name="password" class="form-control mb-3" placeholder="كلمة السر" />
                <?php if (isset($errors)): ?>
                  <?php if (!empty($errors['password_err'])): ?>
                    <?php echo $errors['password_err']; ?>
                  <?php endif; ?>
                <?php endif; ?>
                <input type="password" name="confirm_password" class="form-control mb-3" placeholder="اعادة كلمة السر" />
                <input type="submit" name="register" class="form-control mb-3 bg-info text-light" value="تسجيل" />
             </form>
             <a href="index.php" class="text-center">تسجيل دخول</a>
          </div>
       </div>
    </div>
    <!-- End Register -->

 <script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
