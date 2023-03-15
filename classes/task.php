<?php
/**
 *
 */
class Task extends Database
{

  public function add_task($user_id , $task)
  {
    // code...
    $stmt = $this->con->prepare("INSERT INTO tasks(postedby , content)
    VALUES(:user_id , :task)");
    $stmt->execute([
      'user_id' => $user_id,
      'task' => $task
    ]);

    if ($stmt) {
      // code...
      return true;
    }
    return false;
  }


  public function get_my_task($user_id)
  {
    // code...
    $stmt = $this->con->prepare("SELECT * FROM tasks WHERE postedby = ?");
    $stmt->execute([$user_id]);
    $my_tasks = $stmt->fetchAll();
    return $my_tasks;
  }

  public function delete_task($task_id)
  {
    // code...
    $stmt = $this->con->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$task_id]);
    if ($stmt) {
      // code...
      return true;
    }
    return false;
  }


  public function get_current_task($task_id)
  {
    $stmt = $this->con->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$task_id]);
    $my_task = $stmt->fetch();
    return $my_task;
  }

  public function update_task($task_id , $task)
  {
    // code...
    $stmt = $this->con->prepare("UPDATE tasks SET content = ? WHERE id =? ");
    $stmt->execute([$task , $task_id ]);
    if ($stmt) {
      // code...
      return true;
    }else{
      return false;
    }
  }

}

 ?>
