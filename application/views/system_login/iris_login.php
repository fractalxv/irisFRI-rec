<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login | iris.</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url() ?>themes/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/admin/css/jquery.datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>themes/login/css/main.css">
	<script src="<?= base_url() ?>themes/admin/js/jquery-1.10.2.js"></script>
	<!--===============================================================================================-->

	<script>
		jQuery(function() {
			jQuery('#datetimepicker').datetimepicker({
				timepicker: false,
				format: 'Y-m-d'
			});
		});
	</script>
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?= form_open('main', 'class="login100-form validate-form"'); ?>
				<span class="login100-form-title p-b-43">
					System Login
				</span>


				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="textUsername">
					<span class="focus-input100"></span>
					<span class="label-input100">Username</span>
				</div>


				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="textPassword">
					<span class="focus-input100"></span>
					<span class="label-input100">Password</span>
				</div>

				<div class="flex-sb-m w-full p-t-3 p-b-32">
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div>
						<a href="<?= base_url() ?>themes/login/#" class="txt1">
							Forgot Password?
						</a>
					</div>
				</div>


				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<div class="text-center p-t-46 p-b-20">
					<span class="txt2">
						or sign up <a href="#" data-toggle="modal" data-target="#myModal">here</a>
					</span>
					<div>
						<strong><a href="<?= base_url() ?>uploads/guide.pdf">Download Enrollment Guide</a></strong>
					</div>
				</div>
				<?= form_close(); ?>


				<div class="login100-more" style="background-image: url('<?= base_url() ?>themes/login/images/desk.jpg');">
				</div>
			</div>
		</div>
	</div>
	<style>
		.chosen-container {
			width: 100% !important;
		}
	</style>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sign Up</h4>
				</div>
				<div class="modal-body">
					<div id="stream_list">
						<?= form_open('main/requestRegistration/'); ?>
						<div class="form-group">
							<p class="help-block">
								<b>Please fill the information below</b>
							</p>
						</div>
						<div class="form-group">
							<label>Student Number</label>
							<select data-placeholder="Select your student number" name="nim" class="form-control" tabindex="2" required>
								<option value=""></option>
								<?php
								foreach ($mhs as $a) {
								?>
									<option value="<?= $a->nim ?>"><?= $a->nim ?> - <?= $a->student_name ?></option>
								<?php } ?>
							</select>
							<p class="help-block">Select your student number</p>
						</div>
						<div class="form-group">
							<label for="pwd">Address</label>
							<input class="form-control" type="text" name="almt" required>
						</div>
						<div class="form-group">
							<label for="pwd">City of Born</label>
							<input class="form-control" type="text" name="tlahir" required>
						</div>
						<div class="form-group">
							<label>Birthdate</label>
							<input class="form-control" id="datetimepicker" type="text" name="tglahir" required>
						</div>
						<div class="form-group">
							<label for="pwd">Email</label>
							<input class="form-control" type="text" name="email" required>
						</div>
						<div class="form-group">
							<label for="pwd">Mobile Number</label>
							<input class="form-control" type="text" name="tlp" required>
						</div>
						<div class="form-group">
							<label for="pwd">Password</label>
							<input class="form-control" type="password" name="pass" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-primary  login-button">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>themes/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/admin/js/jquery.datetimepicker.js"></script>
	<script src="<?= base_url() ?>themes/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>themes/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>themes/login/js/main.js"></script>

</body>

</html>