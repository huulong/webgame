

<style type="text/css">
.head-price {
	font-family: "roboto";
	text-transform: uppercase;
	font-size: 20px;
	color: #fff;
	background: #337ab7;
	padding: 10px 0;
	text-align: center;
}
.body-price {
	background: #fff;
	color: #262626;
	font-family: "Montserrat";
	font-weight: 600;
	padding: 5px 10px;
	border-bottom: 1px solid #ccc;
}
.price-right {
	float: right;
}
.green {
	color: green;
}
.red {
	color: red;
}
.img-price {
	display: block;
	margin: 0 auto;
	height: 210px;
}
.foot-price {
	width: 100%;
	padding: 10px 0;
	text-align: center;
	display: block;
	background: #f0ad4e;
	margin-bottom: 10px;
	color: #fff;
	font-family: "Montserrat";
	font-weight: bold;
	transition: 0.3s linear;
}
.foot-price:hover {
	text-decoration: none;
	background: #fff;
	color: #262626;
}
</style>

<div class="container margin-top-20px">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<legend style="text-align:center;text-shadow: 0 0 10px red;font-family: 'roboto';color: #fff; text-transform: uppercase;">Danh Sách Tài Khoản Minecraft</legend>
				<div class="col-sm-4">

					<div class="box-price">
						<div class="head-price">
							Normal Account
						</div>

						<?php

						$count = $connect->query("SELECT COUNT(*) FROM dsacc_mine WHERE loai='normal'");

						$coutrow = mysqli_num_rows($count);

						?>



						<div class="body-price">
							<img src="https://accminecraft.com/assets/img/accthuongthumb.png" class="img-price" width="200px" style=" box-shadow: 0 0 5px #ccc;">
							Giá: <strong>5,000đ</strong> <span class="price-right">Còn Lại: <strong><?php echo number_format($coutrow) ?> Acc</strong></span>
						</div>
						<a href="../view_mine.php?act=xem&loai=normal" class="foot-price">Xem Chi Tiết</a>
					</div>

				</div>
				<div class="col-sm-4">

					<div class="box-price">
						<div class="head-price">
							Skin Accounts
						</div>

						<?php

						$count = $connect->query("SELECT COUNT(*) FROM dsacc_mine WHERE loai='normal'");

						$coutrow = mysqli_num_rows($count);

						?>



						<div class="body-price">
							<img src="https://accminecraft.com/assets/img/100kthumb.png" class="img-price" width="200px" style=" box-shadow: 0 0 5px #ccc;">
							Giá: <strong>100,000đ</strong> <span class="price-right">Còn Lại: <strong><?php echo number_format($coutrow) ?> Acc</strong></span>
						</div>
						<a href="?act=xem&loai=skin" class="foot-price">Xem Chi Tiết</a>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="box-price">
						<div class="head-price">
							Full Info
						</div>

						<?php

						$count = $connect->query("SELECT COUNT(*) FROM dsacc_mine WHERE loai='info'");

						$coutrow = mysqli_num_rows($count);

						?>

						<div class="body-price">
							<img src="https://accminecraft.com/assets/img/unmigratedthumb2.png" class="img-price" width="200px" style=" box-shadow: 0 0 5px #ccc;">
							Giá: <strong>350,000đ</strong> <span class="price-right">Còn Lại: <strong><?php echo number_format($coutrow) ?> Acc</strong></span>
						</div>
						<a href="?act=xem&loai=info" class="foot-price">Xem Chi Tiết</a>
					</div>

				</div>
			</div>
		</div>
	</div>