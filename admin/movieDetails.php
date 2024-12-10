<?php require_once('action/dashboard-handle.php'); ?>
<?php require_once('action/movie-handle.php'); ?>

<?php
	$movieImageDetails = getImageMovie($movieId);
?>

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
								<li class="breadcrumb-item active" aria-current="page">Movie Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

        <div class="container">
          <div class="main-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="<?php echo $movieImageDetails ?>" class="d-block w-100" alt="...">
                </div>
              </div>
              <div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Tên phim</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="<?php echo $movieTitleDetails ?>">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Đạo diễn</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="<?php echo $movieDirectDetails ?>">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Diễn viên</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="<?php echo $movieCastDetails ?>">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Thời lượng</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="<?php echo $movieDurationDetails ?> phút">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mô tả</h6>
											</div>
											<div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" style="height: 109px;" placeholder="<?php echo $movieDescDetails ?>"></textarea>
                      </div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4" value="Lưu thay đổi">
											</div>
										</div>
									</div>
								</div>
							</div>
            </div>
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