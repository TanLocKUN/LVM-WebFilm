<?php 
  session_start();
  if(isset($_SESSION['idUser']))
  {
    header('location: index.php');
  } else 
  if(isset($_POST['loginClick']))
  {
    require_once('../assets/database/config.php');
    $userTable = getDataByQuery("SELECT * FROM users WHERE username = '{$_POST['userName']}'");

    $passWord = md5($_POST['passWord']);
    
    $validation = [];

    if(empty($_POST['userName'])){
      $validation['userNameIsEmpty'] = true;
    }

    if($userTable[0]['password'] != $passWord){
      $validation['wrongPassWord'] = true;
    } else if (count($validation) == 0){
      $_SESSION['idUser'] = $userTable[0]['id'];
      header('location: index.php');
    }
  }
?>