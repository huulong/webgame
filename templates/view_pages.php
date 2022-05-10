<?php

if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	echo "<script>swal('Lỗi', 'Vui Lòng Đăng Nhập', 'error')</script>";
	header('refresh:1; url=/');
}

if (isset($_GET['act']) || isset($_GET['id']) || isset($_GET['gia'])) {
	$id = $_GET['id'];
	$act = $_GET['act'];
	$gia = $_GET['gia'];
	if (!$_GET['act']=="xem" || !$_GET['id']!=0 || !$_GET['gia']!=0) {
		echo "<script>swal('Lỗi', 'Chưa Xác Định', 'error')</script>";
		header('refresh:1; url=/');
	}else{
		$query = $connect->query("SELECT * FROM dsacc WHERE id='$id' AND gia='$gia' AND status='0'");
		$row = mysqli_num_rows($query);
		$a = mysqli_fetch_array($query);
		if ($row>0) {
			?>
			<style type="text/css">
				.img-list {
					width: 100%;
					border-bottom: 1px solid #337ab7;
				}
			</style>
			<div class="container margin-top-20px">
				<div class="row">
					<div class="col-sm-3">
						<ul class="nav nav-pills nav-stacked" style="margin-bottom:5px">
							<li class="active"><a data-toggle="tab" href="#main">Trang Chính</a></li>
							<li><a data-toggle="tab" href="#champ">Tướng</a></li>
							<li><a data-toggle="tab" href="#skin">Trang Phục</a></li>
						</ul>
					</div>
					<?php
					// Xử lý khi không có ảnh
					/*$url_empty = "https://vietadsgroup.vn/Uploads/files/banned-la-gi-1.jpg";
					if ($a['thumbnail_champ_1']=="") {
						$a['thumbnail_champ_1'] = $url_empty; // empty champ 1
					}elseif ($a['thumbnail_champ_2']=="") {
						$a['thumbnail_champ_2'] = $url_empty; // empty champ 2
					}elseif ($a['thumbnail_skin_1']=="") {
						$a['thumbnail_skin_1'] = $url_empty; // empty skin 1
					}elseif ($a['thumbnail_skin_2']=="") {
						$a['thumbnail_skin_2'] = $url_empty; // empty skin 2
					}*/
					?>
					<div class="col-sm-6">
						<div class="tab-content">
							<div id="main" class="tab-pane fade in active">
								<div class="list-group">
									<div class="list-group-item active">Trang Chính</div>
									<img src="<?php echo $a['thumbnail']; ?>" class="img-list">
								</div>
							</div>
							<div id="champ" class="tab-pane fade">
								<div class="list-group">
									<div class="list-group-item active">Tướng</div>
									<img src="<?php echo $a['thumbnail_champ']; ?>" class="img-list">
									<img src="<?php echo $a['thumbnail_champ_1']; ?>" class="img-list">
									<img src="<?php echo $a['thumbnail_champ_2']; ?>" class="img-list">
								</div>
							</div>
							<div id="skin" class="tab-pane fade">
								<div class="list-group">
									<div class="list-group-item active">Trang Phục</div>
									<img src="<?php echo $a['thumbnail_skin']; ?>" class="img-list">
									<img src="<?php echo $a['thumbnail_skin_1']; ?>" class="img-list">
									<img src="<?php echo $a['thumbnail_skin_2']; ?>" class="img-list">
								</div>
							</div>
						</div>
					</div>
					<?php
					if ($a['status']=="0") {
						$a['status'] = "Chưa Bán";
					}elseif ($a['status']=="1") {
						$a['status'] = "Đã Mua";
					}
					?>
					<style type="text/css">
						legend {
							font-family: "roboto";
							font-weight: bold;
							text-transform: uppercase;
						}
					</style>
					<script type="text/javascript">
						$(document).ready(function() {
							$('#buy_acc').click(function() {
								var id = $('#idacc').text();
								$.post('../../templates/muaacc.php', {id:id}, function(data) {
									$('#result_buyacc').html(data);
								});
							});
						});
					</script>
					<div class="col-sm-3 text-center">
						<legend style="color: #fff;">Liên Minh #<span id="idacc"><?php echo $a['id']; ?></span> - <?php echo number_format($a['gia']); ?>đ</legend>
						<legend style="color: #fff;">Rank : <?php echo $a['rank']; ?></legend>
						<legend style="color: #fff;">Khung : <?php echo $a['khung']; ?></legend>
						<legend style="color: #fff;">Info : <?php echo $a['info']; ?></legend>
						<legend style="color: #fff">Trạng Thái : <?php echo $a['status']; ?></legend>
						<div id="result_buyacc"></div>
						<button id="buy_acc" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Mua Tài Khoản Này</button>
					</div>
				</div>
			</div>
			
			<?php
		}else{
			echo "<script>swal('Lỗi', 'Hệ Thống Không Có Tài Khoản #".$id." - ".number_format($gia)."đ, Hoặc Đã Bị Người Khác Mua Trước !', 'error')</script>";
			header('refresh:2; url=/');
		}
	}
}

?>