<?php
session_start();
include_once 'classes/Session.php';
include_once 'classes/database.php';
include_once 'classes/task.php';
$session = new Session();
$task = new Task();

$session->check_session();
$my_task = $task->get_current_task($_GET['edit_id']);

if (isset($_GET['logout'])) {
  // code...
  $session->logout();
}

if (isset($_POST['update_task'])) {
  if ($task->update_task($_POST['task_id'] , $_POST['task'])) {
    // code...
    header("location:show_task.php");
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
    <title>Task</title>
</head>
<body>
    <!--Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">مهمة</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="show_task.php">عرض المهام</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_task.php">اضافة مهمة </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?logout">تسجيل خروج</a>
            </li>
            </ul>
        </div>
     </nav>
<!--End navbar -->
    <!-- Start Add task -->
    <div class="container">
        <div class="card" style="width: 500px; margin: 50px auto">
          <div class="card-body">
            <h4 class="card-header text-right"> تعديل المهمة </h4>
            <div class="card-text">
              <?php if (isset($seuccess)): ?>
                <?php echo $seuccess ?>
              <?php endif; ?>
                <form method="post" >
                    <input type="hidden" name="task_id" value="<?php echo $my_task['id']; ?>"/>
                    <textarea name="task" class="form-control" rows="5" placeholder="اكتب المهة" required> <?php echo $my_task['content'] ?> </textarea>
                    <input type="submit" class="btn btn-info mt-3" name="update_task" value="تعديل" />
                </form>
            </div>
          </div>
        </div>
    </div>
    <!-- End Add task -->

 <script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
