<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGHJ4PV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="container-fluid top">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 top-left">
					<span><a href="index.php"><i class="fas fa-home"></i> Trang Chủ</a> | <a href="minecraftshop.php"><i class="fas fa-angle-double-right"></i>Tài Khoản Minecraft</a> | <i class="fas fa-phone"></i> Hỗ Trợ : 0129.273.8151</span>
				</div>
				<div class="col-sm-4 top-right">
					<?php
					if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
						// login or register
						echo '<span><button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-success btn-xs dropdown-toggle"><i class="fas fa-sign-in-alt"></i> Đăng nhập
						</button></span>
						<span><button type="button" data-toggle="modal" data-target="#registerModal" class="btn btn-primary btn-xs dropdown-toggle"><i class="fas fa-user"></i> Đăng Ký
						</button></span>';
					}else{
						$username = $_SESSION['username'];
						$password = $_SESSION['password'];
						$sql = $connect->query("SELECT * FROM accounts WHERE username='$username' AND password='$password'");
						if(mysqli_num_rows($sql)>0){
							$row = mysqli_fetch_array($sql);
						// Phần Xin Tên + Số Dư
							echo '<span><button type="button" class="btn btn-primary btn-xs" title="'.$row['fullname'].' - '.number_format($row['cash']).'đ">Xin Chào '.$row['fullname'].' | Số Dư : '.number_format($row['cash']).'đ</button><a href="index.php?act=loguot" class="btn btn-primary btn-xs" style="color:#fff;">Thoát</a></span>';
						}
					}
					if (isset($_GET['act'])) {
						$act = $_GET['act'];
						if ($act=="loguot") {
							session_destroy();
							header('location: /');
						}else{

						}
					}
					?>
					
				</div>
				<div class="modal" id="registerModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" class="close" data-dismiss="modal" type="button">×
								</button>
								<h4 class="modal-title">Đăng Ký Thành Viên</h4>
							</div>
							<div class="modal-body">
								<div class="form-group has-success">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-user"></i></div>
										<input type="text" id="reg_username" placeholder="Tài Khoản Đăng Nhập" class="form-control">
									</div>
								</div>
								<div class="form-group has-warning">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-user"></i></div>
										<input type="text" id="reg_fullname" placeholder="Tên Đầy Đủ Họ & Tên" class="form-control">
									</div>
								</div>
								<div class="form-group has-success">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-key"></i></div>
										<input type="password" id="reg_password" placeholder="Mật Khẩu Đăng Nhập" class="form-control">
									</div>
								</div>
								<div class="form-group has-warning">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-key"></i></div>
										<input type="password" id="reg_re_password" placeholder="Nhập Lại Mật Khẩu Đăng Nhập" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div id="result_register"></div>
								</div>
								<div class="form-group">
									<button id="post_register" class="btn btn-primary" style="width: 100%">Đăng Ký</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal" id="loginModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" class="close" data-dismiss="modal" type="button">×
								</button>
								<h4 class="modal-title">Đăng nhập</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-user"></i></div>
										<input type="text" id="login_username" placeholder="Tên Đăng Nhập" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fas fa-key"></i></div>
										<input type="password" id="login_password" placeholder="Mật Khẩu Đăng Nhập" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div id="result_login"></div>
								</div>
								<div class="form-group">
									<button style="width: 100%" class="btn btn-success" id="post_login">Đăng Nhập</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>