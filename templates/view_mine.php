<?php

if (isset($_GET['act']) || isset($_GET['loai'])) {

	$act = $_GET['act'];
	$loai = $_GET['loai'];

	if ($act=="xem" || $loai=="normal") {

		?>

		<style type="text/css">
		legend {
			color: #fff;
			text-align: center;
		}
		span {
			color: #fff;
		}
	</style>

	<div class="container margin-top-20px">
		<div class="col-sm-6">
			<legend>Acc Minecraft Bình Thường</legend>
			<span>Đây là Account Minecraft bình thường.<br />
				<strong>Không</strong> đổi được tên,skin,pass.<br />
				<strong>Không</strong> có bảo hành.<br />
				Bị ban các server lớn, dễ mất, không nên chơi lâu dài.<br />
				Có thể dùng để <strong>H@ck</strong>,hoặc tăng Power cho Faction.
			</span>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#mua_normal').click(function() {
					swal({
						title: "Lỗi",
						text: "Chức năng đang được xây dựng!",
						type: "error"
					});
				});
			});
		</script>
		<div class="col-sm-6">
			<legend>Thanh Toán</legend>
			<button id="mua_normal" class="btn btn-success">Mua Ngay <span id="loaiacc"><?php echo $_GET['loai']; ?></span> <span id="giaacc">5000</span>đ</button>
			<a href="//fb.com/<?php echo $id_fb; ?>" target="_blank" class="btn btn-warning">Thanh Toán Trực Tiếp</a>
			<div id="result_muaacc"></div>
		</div>
	</div>

	<?php

}

}else{
	header('location: /acc/minecraft.html');
}

?>