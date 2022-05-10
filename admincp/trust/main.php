<body>
	<div class="container-fluid top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php
					if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
						echo '
						<script>
						$(document).ready(function() {
							swal({
								title: "Sorry!, Not working...",
								text: "Bạn Không Phải Là Một Admin",
								type: "error",
								allowOutsideClick: false,
								showCancelButton: false,
								showConfirmButton: false
								});
								$("#mainindex").remove();
								});
								</script>
								';
								header("refresh:3; url=/");
							}else{
								$username = $_SESSION['username'];
								$password = $_SESSION['password'];
								$sql = $connect->query("SELECT * FROM accounts WHERE username='$username' AND password='$password' AND admin='1'");
								if(mysqli_num_rows($sql)>0){
									$row = mysqli_fetch_array($sql);
									echo '<span><button type="button" class="btn btn-primary btn-xs" title="'.$row['fullname'].'">Xin Chào '.$row['fullname'].'</button><a href="?act=loguot" class="btn btn-primary btn-xs" style="color:#fff;">Thoát</a></span>';
									include ("templates/main_pages.php");
								}else{
									echo '
									<script>
									$(document).ready(function() {
										swal({
											title: "Sorry!, Not working...",
											text: "Bạn Không Phải Là Một Admin",
											type: "error",
											allowOutsideClick: false,
											showCancelButton: false,
											showConfirmButton: false
											});
											$("#mainindex").remove();
											});
											</script>
											';
											header("refresh:3; url=/");
										}
									}
									?>
								</div>
							</div>
						</div>
					</div