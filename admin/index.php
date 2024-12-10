<?php require_once('action/dashboard-handle.php'); ?>

<!doctype html>
<html lang="en">

<head>
  <?php require_once('assets/layout/header.php') ?>
  <title>Movie Booking - Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
  <?php require_once('assets/layout/sidebar.php') ?>
		<!--end sidebar wrapper -->
		<!--start header -->
  <?php require_once('assets/layout/navbar.php') ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
    <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Movie List</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
            <?php 
              if(isset($_SESSION['addSuccess'])){
                echo $_SESSION['addSuccess'];
                unset($_SESSION['addSuccess']);
              } else if (isset($_SESSION['addFailed'])){
                echo $_SESSION['addFailed'];
                unset($_SESSION['addFailed']);
              }
            ?>
            <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addMovie"><i class="bx bxs-plus-square"></i>Thêm phim</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>ID</th>
										<th>Tên phim</th>
										<th>Trạng thái</th>
										<th>Giá vé</th>
										<th>Thời lượng</th>
										<th>Chi tiết</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
                <!-- Show Movie -->
                <?php 
                  for($i = 0; $i < count($movieTable); $i++){
                    $movieId = $movieTable[$i]['id'];
                    $movieTitle = $movieTable[$i]['title'];
                    $movieDuration = $movieTable[$i]['duration_min'];
                    $movieDescription = $movieTable[$i]['description'];
                    $movieDirector = $movieTable[$i]['director'];
                    $movieCast = $movieTable[$i]['cast'];
                ?>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="ms-2">
													<h6 class="mb-0 font-14"><?php echo $movieId ?></h6>
												</div>
											</div>
										</td>
										<td><?php echo $movieTitle ?></td>
										<td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Đang chiếu</div></td>
										<td>45.000 VNĐ</td>
										<td><?php echo $movieDuration ?> phút</td>
										<td><a  href="movieDetails?movieId=<?php echo $movieId; ?>" class="btn btn-primary btn-sm radius-30 px-4" >Xem chi tiết</a></td>
										<td>
											<div class="d-flex order-actions">
												<a href="index.php?idMovieDel=<?php echo $movieId ?>"  class="ms-3"><i class='bx bxs-trash'></i></a>
											</div>
										</td>
									</tr>
                  
                <?php
                  }
                ?>
                <!-- End Show Movie -->
								</tbody>
							</table>

            <!-- Modal add movie-->
            <div class="modal fade" id="addMovie" tabindex="-1" style="display: none;" aria-hidden="true">
											<div class="modal-dialog modal-dialog-scrollable">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Thêm phim</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
                          <form action="action/movie-handle.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="card">
                                <div class="card-body bg-light shadow-lg p-4 rounded">
                                <input class="form-control mb-3" type="text" name="title" placeholder="Tên phim" aria-label="default input example">
                                <input class="form-control mb-3" type="text" name="director" placeholder="Đạo diễn" aria-label="default input example">
                                <input class="form-control mb-3" type="text" name="cast" placeholder="Diễn viên" aria-label="default input example">
                                <input class="form-control mb-3" type="text" name="durationMin" placeholder="Thời lượng (phút)" aria-label="default input example">
                                <textarea class="form-control" aria-label="With textarea" name="description" style="height: 109px;" placeholder="Thông tin"></textarea><br/>
                                <input class="form-control form-control-sm" id="movieImageFiles" name="movieImageFiles" type="file">
                              </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button type="submit" name="addMovieClick" class="btn btn-primary">Thêm</button>
                            </div>
                          </form>
												</div>
											</div>
										</div>
            <!-- End Modal -->

						</div>
					</div>
				</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Movie Booking</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
  <?php require_once('assets/layout/footer.php') ?>
</body>

</html>