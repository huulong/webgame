<?php

if (isset($_SESSION['username']) || isset($_SESSION['password'])) {

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	$searchUser = $connect->query("SELECT * FROM accounts WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($searchUser)>0) {
		$profile = mysqli_fetch_array($searchUser);
		?>

		<div class="container margin-top-20px">
			<div class="row">
				<div class="col-sm-4">
					<div class="list-group">
						<div class="list-group-item active">Menu</div>
						<a href="?act=profile" class="list-group-item">Thông Tin Cá Nhân</a>
						<a href="?act=payment" class="list-group-item">Lịch Sử Nạp Thẻ</a>
						<a href="?act=history" class="list-group-item">Lịch Sử Mua Acc</a>
					</div>
				</div>
				<div class="col-sm-8">
					<?php
					if (isset($_POST['post_changepass'])) {
						$oldpass = $_POST['old_pass'];
						$username = $_SESSION['username'];
						$newpass = $_POST['new_pass'];
						$repass = $_POST['renew_pass'];

						$count = mysqli_num_rows($connect->query("SELECT * FROM accounts WHERE username='$username' AND password='$oldpass'"));

						if (empty($oldpass) || empty($newpass) || empty($repass)) {
							echo "<script>swal('Lỗi', 'Không Được Bỏ Trống', 'warning')</script>";
							header('Refresh:1; url=/lichsugiaodich.php?act=pass');
						}elseif ($count>0) {
							if ($newpass===$repass) {
								$updateUser = $connect->query("UPDATE accounts SET password='$newpass' WHERE username='$username'");
								echo "<script>swal('Thành Công', 'Đổi Mật Khẩu Thành Công, Xin Mời Đăng Nhập Lại', 'success')</script>";
								header('refresh:2; url=/');
								session_destroy();
							}else{
								echo "<script>swal('Lỗi', 'Mật Khẩu Không Trùng Khớp', 'info')</script>";
								header('Refresh:1; url=/lichsugiaodich.php?act=pass');
							}
						}else{
							echo "<script>swal('Lỗi', 'Mật Khẩu Cũ Chưa Chính Xác', 'warning')</script>";
							header('Refresh:1; url=/lichsugiaodich.php?act=pass');
						}

						


					}
					?>
					<?php
					if (isset($_GET['act'])) {
						if ($_GET['act']=="pass") {
							?>
							<div class="panel panel-primary">
								<div class="panel-heading">Đổi Mật Khẩu</div>
								<div class="panel-body">
									<form method="post" action="">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">Mật Khẩu Cũ</div>
												<input type="password" name="old_pass" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">Mật Khẩu Mới</div>
												<input type="password" name="new_pass" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">Nhập Lại Mật Khẩu Mới</div>
												<input type="password" name="renew_pass" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<button class="btn btn-primary" name="post_changepass" type="submit">Đổi Mật Khẩu</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php
					}
					if ($_GET['act']=="profile") {
						?>
						<div class="panel panel-primary">
							<div class="panel-heading">Thông Tin Tài Khoản</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<tr>
											<th>Họ & Tên</th>
											<td><?php echo $profile['fullname']; ?></td>
										</tr>
										<tr>
											<th>Tài Khoản</th>
											<td><?php echo $profile['username']; ?></td>
										</tr>
										<tr>
											<th>Số Dư</th>
											<td><?php echo number_format($profile['cash']); ?>đ</td>
										</tr>
										<?php

										if ($profile['admin']!=0) {
											$profile['admin'] = "Quản Trị Viên";
										}else{
											$profile['admin'] = "Thành Viên";
										}

										?>
										<tr>
											<th>Quyền Hạn</th>
											<td><?php echo $profile['admin']; ?></td>
										</tr>
										<tr>
											<th>Mật Khẩu</th>
											<td><a href="?act=pass"><i class="fas fa-pen"></i> Hành Động</a></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<?php
					}
					if ($_GET['act']=="history") {
						?>
						<div class="panel panel-primary">
							<div class="panel-heading">Lịch Sử Mua Acc</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<tr>
											<th>IDACC</th>
											<th>TAIKHOAN</th>
											<th>MATKHAU</th>
											<th>GIA</th>
											<th>LOAI</th>
										</tr>
										<?php
										$searchHistory = $connect->query("SELECT * FROM history_mua WHERE username='".$profile['username']."'");
										if (mysqli_num_rows($searchHistory)>0) {
											while ($historyRow = mysqli_fetch_array($searchHistory)) {
												?>

												<tr>
													<td><?php echo $historyRow['idacc']; ?></td>
													<td><?php echo $historyRow['taikhoan']; ?></td>
													<td><?php echo $historyRow['matkhau']; ?></td>
													<td><?php echo number_format($historyRow['gia']); ?>đ</td>
													<td><?php echo $historyRow['loai']; ?></td>
												</tr>

												<?php
											}
										}
										?>
										<tr>

										</tr>
									</table>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

	<?php

}

}else {
	echo "<script>
	swal('Lỗi', 'Bạn Chưa Đăng Nhập, Vui Lòng Đăng Nhập Để Sử Dụng', 'warning');
	</script>";
	header('refresh:1; url=/');
}

?>