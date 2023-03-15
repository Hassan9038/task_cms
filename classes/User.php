<?php
/**
 *
 */
 include_once 'database.php';
class User extends Database
{

  public function register($username , $password , $email)
  {
    $stmt = $this->con->prepare("INSERT INTO users(username , password , email)
    VALUES(:name , :pass , :email)");
    $stmt->execute([
      'name' => $username,
      'pass' => $password,
      'email' => $email
    ]);

    if ($stmt) {
      // code...
      return true;
    }
    return false;
  }

  public function login($username , $password)
  {
    // code...
    $stmt = $this->con->prepare("SELECT username , password FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username  ,  $password]);
    $count = $stmt->rowCount();
    return $count;
  }

  public function get_current_user($username , $password)
  {
    $stmt = $this->con->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username  ,  $password]);
    $data = $stmt->fetch();
    return $data;
  }

  public function check_user_exsit($username)
  {
    // code...
    $stmt = $this->con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $count = $stmt->rowCount();
    return $count;
  }

}


 ?>
