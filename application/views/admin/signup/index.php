<script>
		jQuery(function(){
		jQuery('#dtp').datetimepicker({
		  timepicker:false,
		  format:'Y-m-d'
		});
		});

		</script>				
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Signup Form	
							</div>
							<div class="panel-body">
								<div id="stream_list">
									<?= form_open('main/requestRegistration/');?>
										<div class="form-group">
											<p class="help-block">
											<b>
											Please fill the information below
											</b>
											</p>
										</div>
										<div class="form-group">
											<label>NIM</label>
											<br>
											<input class="form-control autocomplete"  type="text" name="nim" id="nim" >
											<p class="help-block">Pilih NIM</p>								
										</div>		
										<div class="form-group">
											<label for="pwd">Name</label>
											<input class="form-control autocomplete"  type="text" name="nama" id="nama" tabindex="2" disabled>
										</div>
										<div class="form-group">
											<label for="pwd">Address</label>
											<input class="form-control"  type="text" name="almt" required>
										</div>	
										<div class="form-group">
											<label for="pwd">City of Born</label>
											<input class="form-control"  type="text" name="tlahir" required>
										</div>	
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
									Signup Form	
							</div>
							<div class="panel-body">
								<div id="stream_list">
									
									<div class="form-group">
										<label>Birthdate</label>
										<input class="form-control"  id="dtp" type="text" name="tglahir" required>
										<p class="help-block">Ketik Tanggal Lahir dengan Format YYY-MM-DD (EX : 1980-08-29)</p>								
									</div>
									<div class="form-group">
										<label for="pwd">Email</label>
										<input class="form-control"  type="text" name="email" required>
									</div>
									<div class="form-group">
										<label for="pwd">Mobile Number</label>
										<input class="form-control"  type="text" name="tlp" required>
									</div>		
									<div class="form-group">
										<label for="pwd">Password</label>
										<input class="form-control"  type="password" name="pass" required>
									</div>								
									<button type="submit" class="btn btn-default">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								<?= form_close(); ?>
								</div>
							</div>
						</div>	
					</div>	

			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js" type="text/javascript"></script>
			<script src="<?php echo base_url() ?>themes/admin/js/jquery.autocomplete.js"></script>
			<script type='text/javascript'>
				var site = "<?php echo site_url();?>";
				$(function(){
					$('.autocomplete').autocomplete({
						// serviceUrl berisi URL ke controller/fungsi yang menangani request kita
						serviceUrl: site+'/main/search',
						// fungsi ini akan dijalankan ketika user memilih salah satu hasil request
						onSelect: function (suggestion) {
							$('#nama').val(''+suggestion.nama); // membuat id 'v_nim' untuk ditampilkan
						}
					});
				});
			</script>		