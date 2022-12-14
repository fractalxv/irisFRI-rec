
<?php
$link_favicon = array(
	'href' => 'themes/logo.ico',
	'rel' => 'shortcut icon',
	'type' => 'image/x-icon');
	
?>	
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?=$title?> | iris.</title>
		<?= link_tag($link_favicon);?>
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>themes/favicon-32x32.png">
		<!-- Core CSS - Include with every page -->
		<link href="<?=base_url()?>themes/admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url()?>themes/admin/css/font-awesome.css" rel="stylesheet">
		<link href="<?=base_url()?>themes/admin/css/sb-admin.css" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url()?>themes/admin/css/chosen.css">
		<link href="<?=base_url()?>themes/admin/css/x.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url() ?>themes/admin/css/jquery.autocomplete.css" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url()?>themes/admin/css/jquery-ui-1.8.9.custom.css" type="text/css" media="screen">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>themes/admin/css/jquery.datetimepicker.css"/ >
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>themes/admin/css/datatables.min.css"/>
		<link rel="stylesheet" href="<?=base_url()?>themes/admin/font-awesome/css/font-awesome.min.css">
		<!-- Core Scripts - Include with every page -->
		<script async="" src="<?=base_url()?>themes/admin/js/analytics.js"></script>
		<script src="<?=base_url()?>themes/admin/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="<?=base_url()?>themes/admin/js/datatables.min.js"></script>
		<script src="<?=base_url()?>themes/admin/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>themes/admin/js/chosen.jquery.js" ></script>
		<script src="<?=base_url()?>themes/admin/js/jquery.metisMenu.js"></script>
		<script src="<?=base_url()?>themes/admin/js/sb-admin.js"></script>
		<script type="text/javascript" src="<?=base_url()?>themes/admin/js/jquery-ui-1.8.9.custom.min.js"></script>
		<script src="<?=base_url()?>themes/admin/js/jquery.datetimepicker.js"></script>
		<script>
					$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
		<script>
					$(document).ready(function() {
				$('#ex').DataTable();
			} );
		</script>
		<script>
		jQuery(function(){
		jQuery('#datetimepicker2').datetimepicker({
		  timepicker:false,
		  format:'Y-m-d'
		});
		});

		</script>
		<script>
		jQuery(function(){
		jQuery('#datetimepicker3').datetimepicker({
		  timepicker:false,
		  format:'Y-m-d'
		});
		});

		</script>
	</head>	