<!DOCTYPE html>
<!--
Seminar-Go
Build For :  School of Industrial and System Engineering Telkom University
Programmer/Creator : Ray Soesanto | RYP
Date : June 2017
This Information System is build based on Xrossbone System by Ray Soesanto
 ______                    ______                                                                   
(_____ \                  / _____)                                     _                            
 _____) ) _____  _   _   ( (____    ___   _____   ___  _____  ____   _| |_   ___                    
|  __  / (____ || | | |   \____ \  / _ \ | ___ | /___)(____ ||  _ \ (_   _) / _ \                   
| |  \ \ / ___ || |_| |   _____) )| |_| || ____||___ |/ ___ || | | |  | |_ | |_| |                  
|_|   |_|\_____| \__  |  (______/  \___/ |_____)(___/ \_____||_| |_|   \__) \___/                   
                (____/                                                                              
-->
<html>
	<?php $this->load->view('xrossbone/head'); ?>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url()?>admin"></a>
				</div>
				
				
			</nav>

				<div class="row">
						<div class="col-lg-12" style="background:url(<?=base_url()?>themes/admin/images/header.jpg) repeat-x top left;background-size:cover;">
							<div style="margin:8px;border:0px solid;background:url(<?=base_url()?>themes/admin/images/cl.png;) no-repeat right;min-height:120px;height:auto;">
								<div style="width:80%;float:left;">	
								<h3 style="color:#fff;">iris.</h3>
									<h5 style="color:#fff;">Integrated Laboratory Recruitment and Training Management System &copy 2019 | RYP x intgr.id</h5>
								</div>
							</div>    
						</div>
				</div>
				<div style="clear:both;height:20px;"></div>
				<?php $this->load->view($content); ?>
				<!--link rel="stylesheet" href="<?=base_url()?>themes/login/js/demo_table_jui.css" type="text/css">
				<link rel="stylesheet" href="<?=base_url()?>themes/login/js/style_app.css" type="text/css">
				<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script-->			
 
			<?php $this->load->view('xrossbone/footer'); ?>
		</div>
	</body>
</html>