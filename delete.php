<?php
session_start();
include_once 'classes/Session.php';
include_once 'classes/database.php';
include_once 'classes/task.php';
$session = new Session();
$task = new Task();

$session->check_session();

if (isset($_GET['delete_id'])) {
  // code...
  if ($task->delete_task($_GET['delete_id'])) {
    // code...
    header("location:show_task.php");
    exit();
  }
}

 ?>
