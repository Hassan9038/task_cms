<?php
session_start();
include_once 'classes/Session.php';
include_once 'classes/database.php';
include_once 'classes/task.php';
$session = new Session();
$task = new Task();

$session->check_session();

if (isset($_GET['logout'])) {
  // code...
  $session->logout();
}

if (isset($_POST['add_task'])) {
  // code...
  if ($task->add_task($_POST['user_id'] , $_POST['task'])) {
    // code...
    $seuccess = "تم اضافة المهمة بنجاح";
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
    <title>Task</title>
</head>
<body>
    <!--Start navbar -->
    <nav class="navbar navbar-expand-lg text-light bg-dark">
        <a class="navbar-brand text-light" >مهمة</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link  text-light" href="show_task.php">عرض المهام</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="add_task.php">اضافة مهمة </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="?logout">تسجيل خروج</a>
            </li>
            </ul>
        </div>
     </nav>
<!--End navbar -->
    <!-- Start Add task -->
    <div class="container">
        <div class="card" style="width: 500px; margin: 50px auto">
          <div class="card-body">
            <h4 class="card-header text-right  bg-info text-light mb-2"> اضافة مهمة </h4>
            <div class="card-text">
              <?php if (isset($seuccess)): ?>
                <?php echo $seuccess ?>
              <?php endif; ?>
                <form method="post" >
                    <input type="hidden" name="user_id" value="<?php echo $session->get_session(); ?>"/>
                    <textarea name="task" class="form-control" rows="5" placeholder="اكتب المهة" required></textarea>
                    <input type="submit" class="btn btn-info mt-3" name="add_task" value="اضافة" />
                </form>
            </div>
          </div>
        </div>
    </div>
    <!-- End Add task -->

 <script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
