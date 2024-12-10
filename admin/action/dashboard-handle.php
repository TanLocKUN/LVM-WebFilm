<?php 
  session_start();
  if(!isset($_SESSION['idUser'])){
    header('location: login.php');
  } else {
    require_once('../assets/database/config.php');
    $idUser = $_SESSION['idUser'];
    $user = getDataByQuery("SELECT * FROM users WHERE id = '{$idUser}'");

    $fullUserName = $user[0]['firstName'] . ' ' . $user[0]['lastName'];

    $userAdmin = [];
    if($user[0]['role'] == 1){
      $userRole['isAdmin'] = true;
    } else
    if($user[0]['role'] == 0){
      $userRole['isStaff'] = true;
    }

    #Show Movie;
    $movieTable = getDataByQuery("SELECT * FROM movie");
    
  }

  // movieDetails Handle
  if(isset($_GET['movieId'])){
    $movieId = $_GET['movieId'];
    $movieTableDetails = getDataByQuery("SELECT * FROM movie WHERE id = '{$movieId}'");
    $movieTitleDetails = $movieTableDetails[0]['title'];
    $movieDirectDetails = $movieTableDetails[0]['director'];
    $movieCastDetails = $movieTableDetails[0]['cast'];
    $movieDescDetails = $movieTableDetails[0]['description'];
    $movieDurationDetails = $movieTableDetails[0]['duration_min'];
  }
  if(isset($_GET['idMovieDel'])){
    $movieIdDel = $_GET['idMovieDel'];
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "DELETE FROM movie WHERE id = '{$movieIdDel}'";
    $result = mysqli_query($connect, $query);
    if(!$result){
      echo "";
    }else{
      echo "";
    }
    mysqli_close($connect);
  }

?>