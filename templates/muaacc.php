<?php

include ("../trust/config.php");

$idacc = $_POST['id'];

$user = $_SESSION['username'];


if (isset($user) || isset($idacc)) {
	
	$checkmoney = $connect->query("SELECT * FROM dsacc WHERE id='$idacc'");

	$accsell = mysqli_fetch_array($checkmoney);

	$checkuser = $connect->query("SELECT * FROM accounts WHERE username='$user'");

	$accbuy = mysqli_fetch_array($checkuser);

	$accsell_gia = $accsell['gia'];

	$accbuy_cash = $accbuy['cash'];

	$fullname = $accbuy['fullname'];

	$taikhoan = $accsell['taikhoan'];

	$tienthieu = $accsell_gia-$accbuy_cash;

	$matkhau = $accsell['matkhau'];

	if ($accbuy_cash>=$accsell_gia) {
		
		$delMoney = $connect->query("UPDATE accounts SET cash = `cash` - $accsell_gia WHERE username='$user'");
		
		$insertDB = $connect->query("INSERT INTO history_mua (id, username, fullname, idacc, taikhoan, matkhau, gia, loai) VALUES ('', '$user', '$fullname', '$idacc', '$taikhoan', '$matkhau', '$accsell_gia', 'LMHT')");

		$updateDB = $connect->query("UPDATE dsacc SET status='1' WHERE id='$idacc'");

		if ($delMoney===TRUE || $insertDB===TRUE || $updateDB===TRUE) {

			echo "<script>swal('Thành Công', 'Bạn Đã Mua Thành Công Tài Khoản Số ".$idacc." Với Giá ".number_format($accsell_gia)."', 'success');
			window.setTimeout(function() {
				window.location.href = '/history.html';
				}, 3000);
				</script>";

			}

		}else {
			echo "<script>swal('Lỗi', 'Bạn Không Đủ Tiền Để Mua Tài Khoản Số ".$idacc." - Bạn Còn Thiếu ".number_format($tienthieu)."đ - Vui Lòng Nạp Thêm', 'error')</script>";
		}

	}

	?>