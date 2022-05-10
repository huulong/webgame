<?php

include "../../trust/config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$fullname = $_POST['fullname'];

if (!isset($username) || !isset($re_password) || !isset($password) || !isset($fullname)) {
	header('Location: /');
}else{
	if(strlen($username)<6){
		echo '<script>swal("Thất Bại", "Tài Khoản Phải Trên 6 Ký Tự", "error")</script>';
	}elseif (strlen($password)<6) {
		echo '<script>swal("Thất Bại", "Mật Khẩu Phải Trên 6 Ký Tự", "error")</script>';
	}elseif (strlen($fullname)<6) {
		echo '<script>swal("Thất Bại", "Họ Và Tên Phải Trên 6 Ký Tự", "error")</script>';
	}elseif ($re_password === $password) {
		if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
			echo '<script>swal("Thất Bại", "Vui Lòng Không Được Dùng Khoảng Trắng, Ký Tự Đặc Biệt Trong Tài Khoản", "error")</script>';
		}else{
			$searchMember = $connect->query("SELECT * FROM accounts WHERE username='$username'");
			$searchMemberRow = mysqli_num_rows($searchMember);
			if ($searchMemberRow>0) {
				echo '<script>swal("Thất Bại", "Đã Có Tài Khoản '.$username.' Trong Hệ Thống", "error")</script>';
			}else{
				$insertDB = $connect->query("INSERT INTO `accounts` (id, username, password, fullname, admin, cash) VALUES ('', '$username', '$password', '$fullname', '0', '0')");
				if ($insertDB===TRUE) {
					echo "
					<script>
					swal('Thành Công', 'Đăng Ký Thành Công, Please Wait...', 'success');
					window.setTimeout(function() {
						window.location.href = '/';
						}, 3000);
						</script>
						";
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						$_SESSION['cash'] = "0";
						$_SESSION['fullname'] = $fullname;
					}
				}
			}
		}else{
			echo '<script>swal("Thất Bại", "Nhập Lại Mật Khẩu Chưa Đúng", "error")</script>';
		}
	}

	?>