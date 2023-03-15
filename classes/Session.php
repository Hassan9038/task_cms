<?php
/**
 *
 */
class Session
{

  public function put_session($session)
  {
    // code...
    return $_SESSION['user_id'] = $session;
  }

  public function get_session()
  {
    // code...
    return $_SESSION['user_id'];
  }

  public function check_session()
  {
    // code...
    if (isset($_SESSION['user_id'])) {
      // code...
      return true;
    }else{
      header("location:index.php");
      exit();
    }
  }

  public function logout()
  {
    // code...
    session_unset();
    header("location:index.php");
    exit();
  }
}



 ?>
