<?php

include ("../../admincp/trust/config.php");

if(isset($_POST['khung']) || isset($_POST['rank']) || isset($_POST['info']) || isset($_POST['gia']) || isset($_POST['images']) || isset($_POST['champ']) || isset($_POST['champ1']) || isset($_POST['champ2']) || isset($_POST['skin']) || isset($_POST['skin1']) || isset($_POST['skin2']) || isset($_POST['taikhoan']) || isset($_POST['matkhau'])){
	$khung = $_POST['khung'];
	$rank = $_POST['rank'];
	$info = $_POST['info'];
	$gia = $_POST['gia'];
	$thumbnail = $_POST['images'];
	$thumbnail_champ = $_POST['champ'];
	$thumbnail_champ_1 = $_POST['champ1'];
	$thumbnail_champ_2 = $_POST['champ2'];
	$thumbnail_skin = $_POST['skin'];
	$thumbnail_skin_1 = $_POST['skin1'];
	$thumbnail_skin_2 = $_POST['skin2'];
	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	if (strlen($taikhoan)<4 or strlen($matkhau)<4) {
		echo "<script>swal('Hey Bro! ', 'Tài Khoản Và Mật Khẩu Phải Lớn Hơn 4 Ký Tự', 'info')</script>";
	}else{
		$insertDB = $connect->query("INSERT INTO dsacc (id, taikhoan, matkhau, rank, khung, info, gia, thumbnail, thumbnail_champ, thumbnail_champ_1, thumbnail_champ_2, thumbnail_skin, thumbnail_skin_1, thumbnail_skin_2) VALUES ('', '$taikhoan', '$matkhau', '$rank', '$khung', '$info', '$gia', '$thumbnail', '$thumbnail_champ', '$thumbnail_champ_1', '$thumbnail_champ_2', '$thumbnail_skin', '$thumbnail_skin_1', '$thumbnail_skin_2')");
		if ($insertDB===TRUE) {
			echo "<script>swal('Thành Công! ', 'Đăng Tài Khoản Thành Công', 'success');
			setTimeout(function () {
				window.location.href = '/';
				}, 2000);
				</script>";
			}
		}
	}

	?>