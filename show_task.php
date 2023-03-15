<?php
session_start();
include_once 'classes/Session.php';
include_once 'classes/database.php';
include_once 'classes/task.php';
$session = new Session();
$task = new Task();
$my_tasks = $task->get_my_task($session->get_session());
$session->check_session();

if (isset($_GET['logout'])) {
  // code...
  $session->logout();
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css"/>
    <title>My task</title>
</head>
<body>
    <!--Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-light">مهمة</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-light" href="show_task.php">عرض المهام</a>
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
    <!-- Start show task -->

   <div class="container">
    <div class="card mt-3">
        <div class="card-header text-right bg-info text-light">
            <h4>عرض المهامي</h4>
        </div>
     <div class="card-body">
        <div class="list-group">
          <?php foreach ($my_tasks as $tasks): ?>
              <div class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                     <small class="text-muted"><?php echo $tasks['datetime'] ?></small>
                  </div>
                  <p class="mb-1 text-right mt-2"><?php echo $tasks['content'] ?></p>
                  <hr>
                  <div class="mt-3 text-right">
                      <a href="edit.php?edit_id=<?php echo $tasks['id'] ?>" class="btn btn-info">تعديل</a>
                      <a href="delete.php?delete_id=<?php echo $tasks['id'] ?>" class="btn btn-danger">حذف</a>
                  </div>
                 </div>
                 <br>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

   </div>

    <!-- End show task -->

 <script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
