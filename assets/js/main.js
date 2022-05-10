$(document).ready(function() {

	
	$('#post_register').click(function() {
		var username = $('#reg_username').val();
		var fullname = $('#reg_fullname').val();
		var password = $('#reg_password').val();
		var re_password = $('#reg_re_password').val();
		if(username==""){
			swal("Thất Bại", "Tài Khoản Không Được Để Trống", "error");
		}else{
			if (fullname=="") {
				swal("Thất Bại", "Họ Và Tên Không Được Để Trống", "error");
			}else{
				if (password=="") {
					swal("Thất Bại", "Mật Khẩu Không Được Để Trống", "error");
				}else{
					if(re_password==""){
						swal("Thất Bại", "Nhập Lại Mật Khẩu Không Được Để Trống", "error");
					}else{
						$.post('../assets/ajax/register.php', 
							{username:username, fullname:fullname, password:password, re_password:re_password}, 
							function(data) {
								$('#result_register').html(data);
							});
					}
				}
			}
		}
	});

	$('#post_login').click(function() {
		var username = $('#login_username').val();
		var password = $('#login_password').val();
		if (username==""){
			swal("Thất Bại", "Tài Khoản Không Được Để Trống", "error");
		}else{
			if(password==""){
				swal("Thất Bại", "Mật Khẩu Không Được Để Trống", "error");
			}else{
				$.post('../assets/ajax/login.php',{username:username, password:password}, function(data) {
					$('#result_login').html(data);
				});
			}
		}
	});

	$('#showhistoryPublic').click(function() {
		$('#video').slideToggle();
		$('#historyPublic').slideToggle();
	});

});
