<?php

class Database
{
  private $dsn = 'mysql:host=localhost;dbname=task_db';
  private  $user = 'root';
  private  $pass = "";
  public $con;
  private  $option = array(

  	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

  	);

  public function __construct()
  {

    try{
    	$this->con = new PDO($this->dsn, $this->user, $this->pass, $this->option);
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connect";
    }

    catch(PDOException $e){
    	 echo 'Failed To Connect' . $e->getMessage();
    }

    return $this->con;
  }

}
 ?>
