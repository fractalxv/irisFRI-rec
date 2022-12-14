<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<?php
$link_favicon = array(
	'href' => 'themes/images/fav.ico',
	'rel' => 'shortcut icon',
	'type' => 'image/x-icon');
	
?>	
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Login | L'Artemis</title>
	<?= link_tag($link_favicon);?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS -->
	<link href="<?=base_url()?>/themes/admin/login/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>/themes/admin/login/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>/themes/admin/login/assets/css/main.css" rel="stylesheet" type="text/css">

	<!--[if lte IE 9]>
		<link href="<?=base_url()?>themes/login/_assets/css/main-ie.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>themes/login/_assets/css/main-ie-part2.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>/themes/admin/login/images/lpdp_logo_144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>/themes/admin/login/images/lpdp_logo_114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>/themes/admin/login/images/lpdp_logo_72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=base_url()?>/themes/admin/login/images/lpdp_logo_57.png">
	<style type="text/css">
		body{
			background: url('<?=base_url()?>/themes/admin/login/images/back.jpg')no-repeat center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			background-position:center;	
			margin:0;padding:0;
		}
		.footer2 {
			color: #fff;
			font-size: 0.9em;
			text-align: right;
			width:100%;
			bottom:0px;
			position:relative;
			float:right;
		}
		.logo2{
			right:6em;
			top:3em;
			position:absolute;
		}
		.box1-login {
			color: #cccccc;
			min-height: 160px;
			padding: 10px 20px 10px 15px;
			width: 85%;
		}
		.page-auth .center-block{
			background-color: transparent;
			border:0px;
			width:25%;
		}
		.form-control{
			opacity:0.5;
		}
		.form-control:focus {
			opacity:1;
		}
		.links a {
			color:#fff;
		}
		.btn-custom-primary{
			background-color: #1A7F57;
			
		}
		.btn-custom-primary:hover, .btn-custom-primary:focus, .btn-custom-primary:active, .btn-custom-primary.active,
.btn-custom-primary .open .dropdown-toggle.btn-warning {
			background-color: #000;
		}
		.links{
			text-align:left;
			margin-top:10px;
		}
		.form-horizontal{
			margin-right:20px;
		}
		.inner-page{
			width:50%;
			float:right;
			top:100%;
			right:10em;
			position: relative;
			transform:translateY(120%);
		}
		.socmed{
			float:right;
			margin-left:10px;
		}
		.footer3{
			bottom:0px;
			position:absolute;
			font-size: 0.9em;
			float:right;
			width:100%;
			margin-bottom:10px;	
			padding-right:50px;	
		}	
		#col-md-6-logo{
			float:right;
		}
		#col-md-6-form{
			float:left;
		}	
		@media only screen and (max-width: 990px) {
			.logo3{
				width:200px;				
			}
			.logo2{
				right: 4em;
			}
			.inner-page{
				float:none;
				transform: translateY(100%);
				width: 130%;
				right:0em;
				left:5em;
			}	
			
		}
		@media only screen and (max-width: 690px) {
			.logo3{
				width:150px;				
			}
			.socmed{
				float:left;
				color:#fff;
			}
		}
		@media only screen and (max-width: 550px) {
			.logo3{
				width:200px;				
			}
			.logo2{
				right: 0em;
				top: 1em;
				position:relative;
			}
			#col-md-6-logo{
				
				float:none;
				text-align:center;
				position:relative;	
			}
			#col-md-6-form{
				
				float:none;
			}
			.inner-page{
				float:none;
				transform: translateY(80%);
				width: 100%;
				right:0em;
				left:0em;
			}
			.socmed{
				float:left;
				color:#fff;
			}
			body{
				background: url('<?=base_url()?>/themes/admin/login/images/lpdp_login_potrait_b2.png')no-repeat center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				background-position:center;	
				margin:0;padding:0;
			}
		}
	</style>
</head>

<body>
<div class="content" style="">
<div class="main-content">
	<div class="col-md-6" id="col-md-6-logo" >
		<div class="logo2">
			<a href="<?=base_url()?>themes/login/"><img class="logo3" src="<?=base_url()?>/themes/admin/images/fri.png" alt="" width="400"/></a>
		</div>
	</div>
	<div class="col-md-6" id="col-md-6-form" >
		<div class="inner-page">			
			<div class="login-box center-block">
				<?= form_open('admin','class="form-horizontal"');?>
					<p class="title" style="font-size:12px;color:#fff">System login </p>
					<div class="form-group">
						<label for="username" class="control-label sr-only">Username</label>
						<div class="col-sm-12">
							<div class="input-group">
								<input type="text" placeholder="username" id="username" name="textUsername" class="form-control">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
							</div>
						</div>
					</div>
					<label for="password" class="control-label sr-only">Password</label>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<input type="password" placeholder="password" id="password" name="textPassword" class="form-control">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							</div>
						</div>
					</div>
										
					<button class=" btn btn-custom-primary btn-lg btn-block btn-auth" name='submit' value='submit' "><i class="fa fa-arrow-circle-o-right"></i> <font face="arial">Login</face></button>
				<?= form_close();?>

				<div class="links">
					<p></p>
					<p><a href="<?=base_url()?>themes/login/#">Forgot Username or Password?</a></p>	
					
				</div>
			</div>
		</div>
	</div>
	
</div>
</div>
<div class="content" >
<div class="main-content" >
	<div class="footer3" style="" >
	<div class="socmed"><img  width="30" src="<?=base_url()?>/themes/admin/login/images/youtube.png" alt="" /></div>
	<div class="socmed"><img width="30" src="<?=base_url()?>/themes/admin/login/images/twitter.png" alt="" /></div>	
	<div class="socmed"><img width="30" src="<?=base_url()?>/themes/admin/login/images/facebook.png" alt="" /></div>
	<div class="socmed" style="padding-top:4px;">Sistem Informasi Logistik  &copy; 2017</div>
	
	
	</div>
</div>
</div>
	

	<!-- Javascript -->
	<script src="<?=base_url()?>/themes/login/assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="<?=base_url()?>/themes/login/assets/js/bootstrap/bootstrap.js"></script>
	<script src="<?=base_url()?>/themes/login/assets/js/plugins/modernizr/modernizr.js"></script>

</html>

