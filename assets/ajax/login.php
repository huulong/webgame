<?php

include "../../trust/config.php";

$username = $_POST['username'];
$password = $_POST['password'];
if (!isset($username) || !isset($password)) {
	header('Location: /');
}elseif(strlen($username)<6){
	echo '<script>swal("Thất Bại", "Tài Khoản Phải Trên 6 Ký Tự", "error")</script>';
}elseif (strlen($password)<6) {
	echo '<script>swal("Thất Bại", "Mật Khẩu Phải Trên 6 Ký Tự", "error")</script>';
}elseif (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
	echo '<script>swal("Thất Bại", "Vui Lòng Không Được Dùng Khoảng Trắng, Ký Tự Đặc Biệt Trong Tài Khoản", "error")</script>';
}else{
	$searchMember = $connect->query("SELECT * FROM accounts WHERE username='$username' AND password='$password'");
	$searchMemberRow = mysqli_num_rows($searchMember);
	if ($searchMemberRow>0) {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		echo "
		<script>
		swal('Thành Công', 'Đăng Nhập Thành Công, Please Wait...', 'success');
		window.setTimeout(function() {
			window.location.href = '';
			}, 3000);
			</script>";
		}else{
			echo '<script>swal("Thất Bại", "Tài Khoản Hoặc Mật Khẩu Không Đúng", "error")</script>';
		}
	}
	?>