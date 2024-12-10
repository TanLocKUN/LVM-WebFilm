<?php require_once('action/login-action.php'); ?>

<!doctype html>
<html lang="en">

<head>
	<?php require_once('assets/layout/auth/header.php') ?>
	<title>Movie Booking - Login To Dashboard</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
									</div>
                  <?php if(isset($validation['wrongPassWord'])){
                      echo "<div class='alert  border-0 border-start border-5 border-danger alert-dismissible fade show'>
                      <div>Mật khẩu hoặc tài khoản không đúng!</div>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                  }?>
									<div class="form-body">
										<form class="row g-3" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Username</label>
												<input type="text" name="userName" class="form-control" id="inputEmailAddress" placeholder="Your username">
                        <?php 
                          if(isset($validation['userNameIsEmpty'])){
                            echo '<p>Vui lòng điền tài khoản</p>';
                          }
                        ?>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="passWord" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="loginClick" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<?php require_once('assets/layout/auth/footer.php') ?>
</body>

</html>