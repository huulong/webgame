<?php

include ("../../trust/config.php");

if (isset($_POST['taikhoan']) || isset($_POST['matkhau']) || isset($_POST['rank']) || isset($_POST['khung']) || isset($_POST['info']) || isset($_POST['stt'])) {

	$taikhoan = $_POST['taikhoan'];

	$matkhau = $_POST['matkhau'];

	$rank = $_POST['rank'];

	$khung = $_POST['khung'];

	$info = $_POST['tt'];

	$stt = $_POST['stt'];

	$gia = $_POST['gia'];

	$edit_id = $_POST['edit_id'];

	$edit_acc = $connect->query("UPDATE dsacc SET taikhoan='$taikhoan', matkhau='$matkhau', rank='$rank', khung='$khung', status='$stt', info='$info', gia='$gia' WHERE id='$edit_id'");

	if ($edit_acc===TRUE) {

		echo "<script>swal('Thành Công', 'Chỉnh Sửa Thành Công', 'success'); $(location).attr('href', '/admincp?act=manager')</script>";

	}

}else {

	header('location: /');

}



?>