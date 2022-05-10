<script type="text/javascript">
	$(document).ready(function() {

		$('#dang_tai_khoan').click(function() {
			var khung = $('#admin_khung').val();
			var rank = $('#admin_rank').val();
			var info = $('#admin_info').val();
			var gia = $('#admin_price').val();
			var images = $('#admin_thumbnail').val();
			var champ = $("#admin_thumbnailchamp").val();
			var champ1 = $("#admin_thumbnailchamp1").val();
			var champ2 = $("#admin_thumbnailchamp2").val();
			var skin = $("#admin_thumbnailskin").val();
			var skin1 = $("#admin_thumbnailskin1").val();
			var skin2 = $("#admin_thumbnailskin2").val();
			var taikhoan = $('#admin_user').val();
			var pass = $('#admin_pass').val();
			if (khung=="") {
				swal("Lỗi", "Khung Không Được Bỏ Trống", "error");
			}else if(rank=="") {
				swal("Lỗi", "Rank Không Được Bỏ Trống", "error");
			}else if(info=="") {
				swal("Lỗi", "Info Không Được Bỏ Trống", "error");
			}else if(gia=="") {
				swal("Lỗi", "Giá Không Được Bỏ Trống", "error");
			}else if(images=="") {
				swal("Lỗi", "Images Không Được Bỏ Trống", "error");
			}else if(champ==""){
				swal("Lỗi", "Ảnh Tướng Không Được Bỏ Trống", "error");
			}else if(skin==""){
				swal("Lỗi", "Skin Không Được Bỏ Trống", "error");
			}else if(taikhoan==""){
				swal("Lỗi", "Tài Khoản Không Được Bỏ Trống", "error");
			}else if(pass==""){
				swal("Lỗi", "Mật Khẩu Không Được Bỏ Trống", "error");
			}else{
				$.post('../../admincp/templates/upaccounts.php', {khung:khung, rank:rank, info:info, gia:gia, images:images, champ:champ, champ1:champ1, champ2:champ2, skin:skin, skin1:skin1, skin2:skin2, taikhoan:taikhoan, matkhau:pass}, function(data){
					$('#result_dangacc').html(data);
				})
			}
		});

		$('#chinh_sua_acc').click(function() {

			var edit_id = $('#edit_id').text();
			var taikhoan = $('#edit_user').val();
			var matkhau = $('#edit_pass').val();
			var rank = $('#edit_rank').val();
			var khung = $('#edit_khung').val();
			var tt = $('#edit_info').val();
			var stt = $('#edit_stt').val();
			var gia = $('#edit_gia').val();

			$.post('../../admincp/templates/editaccounts.php', {taikhoan:taikhoan, matkhau:matkhau, rank:rank, khung:khung, tt:tt, stt:stt, gia:gia, edit_id:edit_id}, function(data) {

				$('#result_edit').html(data);

			});

		});

	});



</script>
<?php

if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="edit") {
		$search1 = $connect->query("SELECT * FROM dsacc WHERE id='".$_GET['id']."'");
		$id = $_GET['id'];
		$editacc = mysqli_fetch_array($search1);
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">Chỉnh Sửa Tài Khoản Số <span id="edit_id"><?php echo $id; ?></span></div>
			<div class="panel-body">
				<div id="result_edit"></div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Tài Khoản</div>
						<input type="text" class="form-control" id="edit_user" value="<?php echo $editacc['taikhoan']; ?>">
						<div class="input-group-addon">Tài Khoản Cũ</div>
						<input type="text" id="old_user" class="form-control" disabled value="<?php echo $editacc['taikhoan']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Mật Khẩu</div>
						<input type="text" class="form-control" id="edit_pass" value="<?php echo $editacc['matkhau']; ?>">
						<div class="input-group-addon">Mật Khẩu Cũ</div>
						<input type="text" class="form-control" disabled value="<?php echo $editacc['matkhau']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Giá</div>
						<input type="number" class="form-control" id="edit_gia" value="<?php echo $editacc['gia']; ?>">
						<div class="input-group-addon">Giá Cũ</div>
						<input type="text" class="form-control" disabled value="<?php echo $editacc['gia']; ?>đ">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Rank</div>
						<select class="form-control" id="edit_rank">
							<option value="<?php echo $editacc['rank']; ?>">-- Không Chỉnh Sửa --</option>
							<option value="Chưa Rank">Chưa Rank</option>
							<option value="Bạc">Rank Bạc</option>
							<option value="Vàng">Rank Vàng</option>
							<option value="Bạch Kim">Rank BK</option>
							<option value="Kim Cương">Rank KC</option>
							<option value="Cao Thủ">Rank CT</option>
							<option value="Thách Đấu">Rank TĐ</option>
						</select>
						<div class="input-group-addon">Rank Cũ</div>
						<input type="text" value="<?php echo $editacc['rank']; ?>" class="form-control" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Khung</div>
						<select class="form-control" id="edit_khung">
							<option value="<?php echo $editacc['khung']; ?>">-- Không Chỉnh Sửa--</option>
							<option value="Chưa Khung">Chưa Khung</option>
							<option value="Bạc">Khung Bạc</option>
							<option value="Vàng">Khung Vàng</option>
							<option value="Bạch Kim">Khung BK</option>
							<option value="Kim Cương">Khung KC</option>
							<option value="Cao Thủ">Khung CT</option>
							<option value="Thách Đấu">Khung TĐ</option>
						</select>
						<div class="input-group-addon">Khung Cũ</div>
						<input type="text" value="<?php echo $editacc['khung']; ?>" class="form-control" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Thông Tin</div>
						<select class="form-control" id="edit_info">
							<option value="<?php echo $editacc['info']; ?>">-- Không chỉnh Sửa --</option>
							<option value="Trắng">Trắng</option>
							<option value="Số Điện Thoại">Số Điện Thoại</option>
							<option value="Gmail">Gmail</option>
						</select>
						<div class="input-group-addon">Info Cũ</div>
						<input type="text" value="<?php echo $editacc['info']; ?>" class="form-control" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Status</div>
						<select class="form-control" id="edit_stt">
							<option value="<?php echo $editacc['status']; ?>">-- Không Chỉnh Sửa --</option>
							<option value="0">-- Chưa Bán = 0 --</option>
							<option value="1">-- Đã Bán = 1 --</option>
						</select>
						<div class="input-group-addon">Stt Cũ</div>
						<input type="number" class="form-control" disabled value="<?php echo $editacc['status']; ?>">
					</div>
				</div>
				<div class="form-group">
					<button id="chinh_sua_acc" class="btn btn-warning"><i class="fas fa-cogs"></i> Hành Động</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sua_anh"><i class="fas fa-images"></i> Sửa Ảnh</button>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#edit_thumbnail').change(function() {
					var new_thumbnail = $('#edit_thumbnail').val();
					$('#view_thumbnail').attr('src', new_thumbnail);
				});
				$('#edit_thumbnail_champ').change(function() {
					var new_thumbnail = $('#edit_thumbnail_champ').val();
					$('#view_thumbnail_champ').attr('src', new_thumbnail);
				});
				$('#edit_thumbnail_champ_1').change(function() {
					var new_thumbnail = $('#edit_thumbnail_champ_1').val();
					$('#view_thumbnail_champ_1').attr('src', new_thumbnail);
				});
				$('#edit_thumbnail_champ_2').change(function() {
					var new_thumbnail = $('#edit_thumbnail_champ_2').val();
					$('#view_thumbnail_champ_2').attr('src', new_thumbnail);
				});

				// skin

				$('#edit_thumbnail_skin').change(function() {
					var new_thumbnail = $('#edit_thumbnail_skin').val();
					$('#view_thumbnail_skin').attr('src', new_thumbnail);
				});
				$('#edit_thumbnail_skin_1').change(function() {
					var new_thumbnail = $('#edit_thumbnail_skin_1').val();
					$('#view_thumbnail_skin_1').attr('src', new_thumbnail);
				});
				$('#edit_thumbnail_skin_2').change(function() {
					var new_thumbnail = $('#edit_thumbnail_skin_2').val();
					$('#view_thumbnail_skin_2').attr('src', new_thumbnail);
				});

			});
		</script>
		<div id="sua_anh" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Chỉnh Sửa Hình Ảnh</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Thumbnail</div>
								<input type="text" id="edit_thumbnail" value="<?php echo $editacc['thumbnail']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Thumbnail</li>
							<img id="view_thumbnail" src="<?php echo $editacc['thumbnail']; ?>" width="100%">
						</ul>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Tướng</div>
								<input type="text" id="edit_thumbnail_champ" value="<?php echo $editacc['thumbnail_champ']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Tướng</li>
							<img id="view_thumbnail_champ" src="<?php echo $editacc['thumbnail_champ']; ?>" width="100%">
						</ul>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Tướng 1</div>
								<input type="text" id="edit_thumbnail_champ_1" value="<?php echo $editacc['thumbnail_champ']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Tướng 1</li>
							<img id="view_thumbnail_champ_1" src="<?php echo $editacc['thumbnail_champ_1']; ?>" width="100%">
						</ul>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Tướng 2</div>
								<input type="text" id="edit_thumbnail_champ_2" value="<?php echo $editacc['thumbnail_champ']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Tướng 2</li>
							<img id="view_thumbnail_champ_2" src="<?php echo $editacc['thumbnail_champ_2']; ?>" width="100%">
						</ul>

						<!-- Skin -->

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Skin</div>
								<input type="text" id="edit_thumbnail_skin" value="<?php echo $editacc['thumbnail_skin']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Skin</li>
							<img id="view_thumbnail_skin" src="<?php echo $editacc['thumbnail_skin']; ?>" width="100%">
						</ul>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Skin 1</div>
								<input type="text" id="edit_thumbnail_skin_1" value="<?php echo $editacc['thumbnail_skin_1']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Skin 1</li>
							<img id="view_thumbnail_skin_1" src="<?php echo $editacc['thumbnail_skin_1']; ?>" width="100%">
						</ul>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Ảnh Skin 2</div>
								<input type="text" id="edit_thumbnail_skin_2" value="<?php echo $editacc['thumbnail_skin_2']; ?>" class="form-control">
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item active">Xem Trước Skin 2</li>
							<img id="view_thumbnail_skin_2" src="<?php echo $editacc['thumbnail_skin_2']; ?>" width="100%">
						</ul>
					</div>
					<div class="modal-footer">
						<button id="post_repair_thumbnail" class="btn btn-primary"><i class="fas fa-cog"></i> Hành Động</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
		<?php
	}


	if ($act=="member") {
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				Quản Lí Thành Viên
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>USER</th>
							<th>PASS</th>
							<th>NAME</th>
							<th>ADMIN</th>
							<th>CASH</th>
							<th>ACT</th>
						</tr>
						<?php
						$searchMember = $connect->query("SELECT * FROM accounts ORDER BY id");
						if (mysqli_num_rows($searchMember)>0) {
							while ($memb = mysqli_fetch_array($searchMember)) {
								?>
								<tr>
									<td><?php echo $memb['id']; ?></td>
									<td><?php echo $memb['username']; ?></td>
									<td><?php echo $memb['password']; ?></td>
									<td><?php echo $memb['fullname']; ?></td>
									<td><?php echo $memb['admin']; ?></td>
									<td><?php echo number_format($memb['cash']); ?>đ</td>
									<td><a target="_blank" href="?act=edit_member&id=<?php echo $memb['id']; ?>"><i class="fas fa-pen"></i></a></td>
								</tr>
								<?php
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<?php
	}

	if ($act=="manager") {
		$search = $connect->query("SELECT * FROM dsacc ORDER BY id");
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">Quản Lí Tài Khoản</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>TK</th>
							<th>MK</th>
							<th>RANK</th>
							<th>KHUNG</th>
							<th>INFO</th>
							<th>GIA</th>
							<th>ACT</th>
						</tr>
						<?php
						while ($manager = mysqli_fetch_array($search)) {
							?>
							<tr>
								<td><?php echo $manager['id']; ?></td>
								<td><?php echo $manager['taikhoan']; ?></td>
								<td><?php echo $manager['matkhau']; ?></td>
								<td><?php echo $manager['rank']; ?></td>
								<td><?php echo $manager['khung']; ?></td>
								<td><?php echo $manager['info']; ?></td>
								<td><?php echo number_format($manager['gia']); ?></td>
								<td><a href="index.php?act=edit&id=<?php echo $manager['id']; ?>"><i class="fas fa-pen"></i></a></td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<?php
	}
	if ($act=="post") {
		echo '
		<div class="panel panel-primary">
		<div class="panel-heading">Đăng Tài Khoản LOL</div>
		<div class="panel-body">
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Khung</div>
		<select class="form-control" id="admin_khung">
		<option value="">-- Chọn Loại Khung --</option>
		<option value="Chưa Khung">Chưa Khung</option>
		<option value="Bạc">Khung Bạc</option>
		<option value="Vàng">Khung Vàng</option>
		<option value="Bạch Kim">Khung BK</option>
		<option value="Kim Cương">Khung KC</option>
		<option value="Cao Thủ">Khung CT</option>
		<option value="Thách Đấu">Khung TĐ</option>
		</select>
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Rank</div>
		<select class="form-control" id="admin_rank">
		<option value="">-- Chọn Loại Rank --</option>
		<option value="Chưa Rank">Chưa Rank</option>
		<option value="Bạc">Rank Bạc</option>
		<option value="Vàng">Rank Vàng</option>
		<option value="Bạch Kim">Rank BK</option>
		<option value="Kim Cương">Rank KC</option>
		<option value="Cao Thủ">Rank CT</option>
		<option value="Thách Đấu">Rank TĐ</option>
		</select>
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Thông Tin</div>
		<select class="form-control" id="admin_info">
		<option value="">-- Thông Tin Acc --</option>
		<option value="Trắng">Trắng</option>
		<option value="Số Điện Thoại">Số Điện Thoại</option>
		<option value="Gmail">Gmail</option>
		</select>
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Giá</div>
		<input class="form-control" type="number" id="admin_price">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Chính</div>
		<input class="form-control" type="text" id="admin_thumbnail">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Tướng</div>
		<input class="form-control" type="text" id="admin_thumbnailchamp">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Tướng 1</div>
		<input class="form-control" type="text" id="admin_thumbnailchamp1" placeholder="Không Cần thì để trống">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Tướng 2</div>
		<input class="form-control" type="text" id="admin_thumbnailchamp2" placeholder="Không Cần thì để trống">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Skin</div>
		<input class="form-control" type="text" id="admin_thumbnailskin">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Skin 1</div>
		<input class="form-control" type="text" id="admin_thumbnailskin1" placeholder="Không Cần thì để trống">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Ảnh Skin 2</div>
		<input class="form-control" type="text" id="admin_thumbnailskin2" placeholder="Không Cần thì để trống">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Tài Khoản</div>
		<input class="form-control" type="text" id="admin_user">
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
		<div class="input-group-addon">Mật Khẩu</div>
		<input class="form-control" type="text" id="admin_pass">
		</div>
		</div>
		<div id="result_dangacc"></div>
		<div class="form-group">
		<button id="dang_tai_khoan" class="btn btn-success">Đăng Tài Khoản</button>
		</div>
		</div>
		</div>
		';
	}
	if ($act=="loguot") {
		session_destroy();
		header('Location: /');
	}
}

?>