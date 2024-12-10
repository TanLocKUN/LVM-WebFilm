<?php 
  CONST HOSTNAME = '127.0.0.1'; // Xài Xampp hoặc Wamp thì đổi thành localhost
  CONST USER     = 'root'; // username của phpmyadmin
  CONST PASS     = '0987675749';  // password của phpmyadmin
  CONST DB       = 'movie'; // đặt tên CSDL tùy thích hoặc để im movie cũng được


  // DATABASE: CƠ SỞ DỮ LIỆU
  // TABLE: BẢNG
  // ROW: CỘT

  // Các hàm tạo DATABASE
  function createDatabase(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS);
    $query   = "CREATE DATABASE IF NOT EXISTS " . DB;
    $result  = mysqli_query($connect, $query);
    mysqli_close($connect);
  }

  function createUserTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query   = "CREATE TABLE IF NOT EXISTS `users`(
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `username` VARCHAR(50) NOT NULL,
            `password` VARCHAR(100) NOT NULL,
            `phone` VARCHAR(13),
            `email` VARCHAR(120),
            `firstName` VARCHAR(120),
            `lastName` VARCHAR(120),
            `gender` INT, -- 1 Name, 0 Nữ
            `status` INT, -- 1 Online, 0 offline
            `role` INT -- 1 ADMIN, 0 STAFF
    );";
    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
  }

  function createReservationTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `reservation`(
                `id` INT PRIMARY KEY AUTO_INCREMENT,
                `reserved` BIT NULL,
                `paid` BIT NULL,
                `active` BIT NULL,
                `users_id` INT NULL,
                `customer_id` INT NULL);
              ALTER TABLE `reservation` 
                ADD FOREIGN KEY (users_id) REFERENCES `users`(id),
                ADD FOREIGN KEY (customer_id) REFERENCES `customer`(id);";

    $result = mysqli_multi_query($connect, $query);
    mysqli_close($connect);
  }

  function createSeatReservedTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `seat_reserved`(
                `id` int PRIMARY KEY AUTO_INCREMENT,
                `seat_id` INT,
                `reservation_id` INT ,
                `screening_id` INT );
              ALTER TABLE `seat_reserved` 
                ADD FOREIGN KEY (seat_id) REFERENCES `seat`(id),
                ADD FOREIGN KEY (reservation_id) REFERENCES `reservation`(id),
                ADD FOREIGN KEY (screening_id) REFERENCES `screening`(id);";

    $result = mysqli_multi_query($connect, $query);
    mysqli_close($connect);
  }

  function createSeatTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `seat`(
                `id` INT PRIMARY KEY AUTO_INCREMENT,
                `row` INT,
                `number` INT,
                `branch_id` INT);
              ALTER TABLE `seat`
                ADD FOREIGN KEY (branch_id) REFERENCES `branch`(id);
              ";

    $result = mysqli_multi_query($connect, $query);
    mysqli_close($connect);
  }

  function createBranchTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `branch`(
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(32),
                seats_no INT
              );";

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
  }

  function createScreeningTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `screening`(
                id INT PRIMARY KEY AUTO_INCREMENT,
                movie_id INT,
                branch_id INT,
                screening_start TIMESTAMP
              );
              ALTER TABLE `screening`
                ADD FOREIGN KEY (movie_id) REFERENCES `movie`(id),
                ADD FOREIGN KEY (branch_id) REFERENCES `branch`(id)
              ";

    $result = mysqli_multi_query($connect, $query);
    mysqli_close($connect);
  }

  function createMovieTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `movie`(
              `id` INT PRIMARY KEY AUTO_INCREMENT,
              `title` VARCHAR(256),
              `director` VARCHAR(256) NULL,
              `cast` VARCHAR(1024) NULL,
              `description` TEXT NULL,
              `duration_min` INT NULL
            );";

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
  }

  function createCustomerTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $query = "CREATE TABLE IF NOT EXISTS `customer`(
              `id` INT PRIMARY KEY AUTO_INCREMENT,
              `firstName` VARCHAR(120) charset utf8,
              `lastName` VARCHAR(120) charset utf8,
              `email`    VARCHAR(120),
              `passWord` VARCHAR(120),
              `gender`  INT, -- 1 nam, 0 Nữ
              `phone` varchar(13),
              `ccid`  varchar(13),
              `timecreated` DATETIME
    );";
    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
  }

  function initUserTable(){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $password = md5('@Admin!123');
    $query = "
              INSERT INTO `users`(`username`, `password`, `phone`, `email`, `firstName`, `lastName`, `gender`,  `status`, `role`) VALUES ('admin1','{$password}','0934718460','dopagovn@gmail.com','Thịnh','Nguyễn',1,1,1);
              INSERT INTO `users`(`username`, `password`, `phone`, `email`, `firstName`, `lastName`, `gender`, `status`, `role`) VALUES ('admin2','{$password}','0903530693','munnguy@gmail.com','Như','Ngụy',0,1,1);
              INSERT INTO `users`(`username`, `password`, `phone`, `email`, `firstName`, `lastName`, `gender`, `status`,`role`) VALUES ('admin3','{$password}','0374094399','thangnguyen290899@gmail.com','Thắng','Nguyễn',1,1,1);
              ";
    $result = mysqli_multi_query($connect, $query);
    mysqli_close($connect);
  }

  // Hàm get dữ liệu

function getAmountRowInTable($tableName){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $result = mysqli_query($connect ,"SELECT count(*) as Amount FROM {$tableName}");
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $amount = $data[0]['Amount'];
    echo $amount;
    mysqli_free_result($result);
    mysqli_close($connect);
    return $amount;
}

function getDataByQuery($query){
    $connect = mysqli_connect(HOSTNAME, USER, PASS, DB);
    $result = mysqli_query($connect ,$query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($connect);
    return $data;
}
?>