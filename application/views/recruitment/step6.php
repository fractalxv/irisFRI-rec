			<?= form_open_multipart('recruitment/requestStep6');?>
			<div class="row">
								<h1>STEP 6 - Additional File</h1>
								<p>Please upload the requirement for us</p>
					<div class="col-lg-4">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Profile	Picture
							</div>
							<div class="panel-body">
								<div id="stream_list">
									<div class="form-group">
										<p class="help-block">
										<?php
										$q = $this->dbs->getOprecFile($kode)->row();
										if ($q != NULL){
										?>
										<img src="<?=base_url().$q->photo_url?>" height ="200" >
										<?php
										}else{
										?>
										<b>
										Ini nanti ada foto lho
										</b>
										<?php } ?>
										</p>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-8">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Add File for Application Form : <?=$kode?>
							</div>
							<input type="hidden" name="kode" value="<?=$kode?>">
							<div class="panel-body">
								<div id="stream_list">
									<div class="form-group">
                                        <label>Upload Your Latest Picture</label>
                                        <input type="file" name="foto">
										<p class="help-block">please upload your latest formal picture!, <b>if you upload your photo with highschool uniform you will be automatically banned</b></p>								
                                    </div>
									<div class="form-group">
                                        <label>Upload Your KHS, KSM, and Your Motivational Letter</label>
                                        <input type="file" name="khs">
										<?php
											if($q != NULL){
										?>
										<p><a href="<?=base_url()?>themes/login/<?=base_url().$q->khs_url?>"><?=$kode?></a></p>
										<?php } ?>
										<p class="help-block">please only use .rar/.zip format lads!!</p>								
                                    </div>
									<button type="submit" class="btn btn-default">Upload Please!</button>									
								</div>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
					
			</div>
			<a href="<?=base_url()?>recruitment/step4/<?=$kode?>" class="btn btn-primary btn-danger  login-button">Back</a>
			<a href="<?=base_url()?>recruitment/finish/<?=$kode?>" class="btn btn-primary btn-success login-button" onClick="return confirm('Are you sure lads?')">Finish</a>