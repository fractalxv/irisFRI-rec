<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<?php
$link_favicon = array(
	'href' => 'themes/r.ico',
	'rel' => 'shortcut icon',
	'type' => 'image/x-icon');
	
?>	
<html>
	<head>
		<title>Login | iris.</title>
		<link href="<?=base_url()?>/themes/login/css/login.css" rel="stylesheet" type="text/css">
		<link href="<?=base_url()?>/themes/login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script>
			 $(document).ready(function () {
				$('.forgot-pass').click(function(event) {
				  $(".pr-wrap").toggleClass("show-pass-reset");
				}); 
				
				$('.pass-reset-submit').click(function(event) {
				  $(".pr-wrap").removeClass("show-pass-reset");
				}); 
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="pr-wrap">
						<div class="pass-reset">
							<label>
								Enter the email you signed up with</label>
							<input type="email" placeholder="Email" />
							<input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
						</div>
					</div>
					<div class="wrap">
						<p class="form-title">
							E-Recruitment</p>
						<?= form_open('main','class="login"');?>
						<input type="text" name="textUsername" placeholder="Username" />
						<input type="password" name="textPassword" placeholder="Password" />
						<input type="submit" value="Login" class="btn btn-success btn-sm" />
						<div class="remember-forgot">
							<div class="row">
								<div class="col-md-12 forgot-pass-content">
									<div style="color:white;font-size:9pt">New User? Register <a href="<?=base_url()?>main/register">Here</a></div>
								</div>
							</div>
						</div>
						<?= form_close();?>
					</div>
				</div>
			</div>
			<div class="posted-by">&copy 2017 <a href="<?=base_url()?>themes/login/http://ensyselab.bie.telkomuniversity.ac.id">Enterprise System Engineering Lab</a></div>
		</div>
	</body>
</html>
