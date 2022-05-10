<div class="container margin-top-20px">
	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					NẠP THẺ TỰ ĐỘNG
				</div>
				<div class="panel-body">
					<form method="post" action="napthe.php">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Loại Thẻ</div>
								<select class="form-control" name="chonmang">
									<?php 
									$mang_option = file_get_contents("http://api.napthengay.com/v2/AllowedNetworks.php");
									echo $mang_option;
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Mệnh Giá</div>
								<select class="form-control" name="card_value">
									<option value="">Chọn đúng mệnh giá</option>
									<option value="10000">10,000</option>
									<option value="20000">20,000</option>
									<option value="50000">50,000</option>
									<option value="100000">100,000</option>
									<option value="200000">200,000</option>
									<option value="500000">500,000</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Pin</div>
								<input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Seri</div>
								<input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
							</div>
						</div>

						<div class="form-group text-center">
							<button style="" type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
							<a style="" class="btn btn-warning" target="_blank" id="showhistoryPublic">Public</a>
							<a style="" class="btn btn-danger" target="_blank" href="lichsugiaodich.php">Profile</a>
							<a style="" class="btn btn-success" target="_blank" href="minecraftshop.php">Minecraft</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div id="video" class="panel panel-primary">
				<div class="panel-heading">
					SHOPACCGAME24H.NET
				</div>
				<div class="panel-body">
					<iframe width="100%" height="238px" src="https://www.youtube.com/embed/RnBT9uUYb1w?ecver=1&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div id="historyPublic" style="display: none;">
			<div class="col-sm-4">
				<div class="list-group">
					<div class="list-group-item active">Lịch Sử Mua Acc</div>
					<?php
					$sql = $connect->query("SELECT * from history_mua ORDER BY id DESC LIMIT 5");
					if (mysqli_num_rows($sql)>0) {
						while ($ae = mysqli_fetch_array($sql)) {
							echo '<div class="list-group-item"><i><strong>'.$ae["fullname"].'</strong> Mua Acc '.$ae["loai"].' <strong>'.$ae["idacc"].' - '.number_format($ae["gia"]).'đ</strong></i></div>';
						}
					}else {
						echo '<div class="list-group-item list-group-item-danger">Chưa Có Giao Dịch</div>';
					}
					?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="list-group">
					<div class="list-group-item active">Lịch Sử Nạp Thẻ</div>
					<div class="list-group-item list-group-item-danger">Chưa Có Giao Dịch</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container margin-top-20px">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<legend style="text-align:center;text-shadow: 0 0 10px red;font-family: 'roboto';color: #fff; text-transform: uppercase;">Danh Sách Tài Khoản Liên Minh</legend>
				<?php
				$searchAccounts = $connect->query("SELECT * FROM `dsacc` WHERE status='0' ORDER BY `id` DESC");
				$searchAccountsRow = mysqli_num_rows($searchAccounts);
				if ($searchAccountsRow>0) {
					while ($acc = mysqli_fetch_array($searchAccounts)) {
						?>
						<div class="col-sm-3">
							<ul class="list-group">
								<li class="list-group-item active">
									Liên Minh #<?php echo $acc['id']; ?>
								</li>
								<img src="<?php echo $acc['thumbnail']; ?>" width="100%" height="140px">
								<li class="list-group-item">
									Rank : <?php echo $acc['rank']; ?>
								</li>
								<li class="list-group-item">
									Khung : <?php echo $acc['khung']; ?>
								</li>
								<li class="list-group-item">
									Thông Tin : <?php echo $acc['info']; ?>
								</li>
								<li class="list-group-item list-group-item-success">
									Giá : <?php echo number_format($acc['gia']); ?>đ
								</li>
								<li class="list-group-item active">
									<a target="_blank" href="view.php?act=acc&id=<?php echo $acc['id'] ?>&gia=<?php echo $acc['gia']; ?>" class="btn btn-primary" style="width:100%; border-radius:0; font-family: 'Roboto'; font-weight: bold; text-transform: uppercase;">Xem Chi Tiết</a>
								</li>
							</ul>
						</div>
						<?php
					}
				}else{
					echo "<h2 style='color:#fff'>Chúng Tôi Đã Hết Acc, Xin Lỗi Về Sự Bất Tiện Này... Hẹn Gặp Lại Quý Khách Sau!</h2>";
				}
				?>
			</div>
		</div>
	</div>