<?php 
  session_start();
  #add Movie

  function getImageMovie($idImage){
    $imageMovieDir = '../admin/assets/movieImage/' . $idImage;
    if(file_exists($imageMovieDir . '.png')){
        $imageMovieDir .= '.png';
    }
    else if(file_exists($imageMovieDir . '.jpeg')){
        $imageMovieDir .= '.jpeg';
    }
    else if(file_exists($imageMovieDir . '.jpg')){
        $imageMovieDir .= '.jpg';
    }
    else if(file_exists($imageMovieDir . '.ico')){
        $imageMovieDir .= '.ico';
    }
    else{
        $imageMovieDir = '../admin/assets/movieImage/1.jpg';
    }
    return $imageMovieDir;
  }

  if(isset($_POST['addMovieClick'])){

    require_once('../../assets/database/config.php');

    $maxIdMovie = getDataByQuery("SELECT MAX(id) FROM movie");

    $target_Dir =  '../../admin/assets/movieImage/';
    $imgName = $_FILES['movieImageFiles']['tmp_name'];
    $imgMovieFiles = $target_dir . basename($_FILES['movieImageFiles']['name']);
    $uploadCheck = 1;
    $imgExt = strtolower(pathinfo($imgMovieFiles, PATHINFO_EXTENSION));

    $check = getimagesize($imgName);
    if($check !== false) {
      $uploadCheck = 1;
    } else {
      $uploadCheck = 0;
    }
    

    if (file_exists($imgMovieFiles)) {
      $uploadOk = 0;
    }
    

    if($_FILES["movieImageFiles"]["size"] > 500000){
      $uploadCheck = 0;
    }

    if($imgExt != "jpg" && $imgExt != "png" && $imgExt != "jpeg" && $imgExt != "gif"){
      $uploadCheck = 0;
    }

    if($uploadCheck == 0){
      echo "Ảnh chưa được upload";
    } else {
      $rename = $maxIdMovie[0]['MAX(id)'] + 1;
      $newName = $rename . '.' . $imgExt;
      if(move_uploaded_file($imgName, $target_Dir . $newName)){
        echo '';
      }else{
        echo 'Failed';
      }
    }

    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "INSERT INTO movie(`title`, `director`, `cast`, `description`, `duration_min`) VALUES ('{$_POST['title']}', '{$_POST['director']}', '{$_POST['cast']}', '{$_POST['description']}', '{$_POST['durationMin']}')";
    $result = mysqli_query($connect, $query);

    if($result){
      $_SESSION['addSuccess'] = "Đã thêm thành công!";
      header('location: ../index.php');
    }else{
      header('location: ../index.php');
      $_SESSION['addFailed'] = "Thêm thất bại";
    }
  }
?>