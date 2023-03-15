<?php
/**
 *
 */
class Validation
{
  private $err = [];
  private $passed = [];

  public function check_input($data=[])
  {
    if (isset($_POST['register'])) {
       $user_data = [
         'username' => $_POST['username'],
         'passowrd' => $_POST['password'],
         'confirm_password' => $_POST['confirm_password'],
         'email' => $_POST['email'],
         'name_err' => '',
         'password_err' => '',
         'email_err' => ''
       ];

       if (!preg_match("/[a-zA-z0-9]{3,}/" , $user_data['username'])) {
         // code...
         $user_data['name_err'] = "اسم المستخدم غير صحيح";
       }

       if ($user_data['passowrd'] != $user_data['confirm_password']) {
         // code...
         $user_data['password_err'] = "كلمة السر غير مطابق";
       }

       if (empty($user_data['passowrd'])) {
         // code...
          $user_data['password_err'] = "كلمة السر خالي";
       }

       if (strlen($user_data['passowrd']) < 6) {
         // code...
          $user_data['password_err'] = "كلمة السر قصير";
       }

       if (empty($user_data['email'])) {
         // code...
          $user_data['email_err'] = "البريد الالكتروني خالي";
       }

       if (empty($user_data['name_err']) && empty($user_data['password_err']) && empty($user_data['email_err'])) {

         return $this->passed = $user_data;

       }else{
         return $this->err = $user_data;

       }

    }

  }


  public function erros()
  {
    // code...
    return $this->err;
  }

}


 ?>
