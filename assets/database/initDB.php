<?php
  require_once('config.php');

  createDatabase();
  createUserTable();
  createReservationTable();
  createSeatReservedTable();
  createSeatTable();
  createBranchTable();
  createScreeningTable();
  createMovieTable();
  createCustomerTable();
  initUserTable();

  echo "
    <script>
      var check = alert('Khởi tạo thành công!!');
    </script>
  ";

?>