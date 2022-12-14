			<?= form_open('recruitment/requestStep5');?>
			<div class="row">
								<h1>STEP 5 - Achievement</h1>
								<p>Please fill your achievement for the last 3 years</p>
					<div class="col-lg-4">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Add Experience
							</div>
							<input type="hidden" name="kode" value="<?=$kode?>">
							<div class="panel-body">
								<div id="stream_list">
									<div class="form-group">
										<label>Achievement Type</label>
										<select data-placeholder="Select Achievement" name="at" class="form-control chosen-select" tabindex="2" required>
											<option value=""></option>
											<?php
											foreach($s as $nu){
											?>	
											<option value="<?=$nu->id_at?>"><?=$nu->achievement_type_name?></option>
											<?php } ?>
										</select>						
										<p class="help-block">Fill the type of achievement you desired!</p>								
									</div>
									<div class="form-group">
										<label>Achievement Name</label>
										<input class="form-control"  type="text" name="aname" >							
										<p class="help-block">Fill the type of achievement name lads!</p>								
									</div>
									<div class="form-group">
										<label>Achievement Year</label>
										<input class="form-control"  type="text" name="ayear" >							
										<p class="help-block">Fill the year lads!</p>								
									</div>
									
									<button type="submit" class="btn btn-default">Add Please!</button>									
								</div>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
					<div class="col-lg-8">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Achievement Information
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Achievement Type</th>
											<th>Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($og as $l){ ?>
										<tr>
											<td><?=$l->year?></td>
											<td><?=$l->achievement_type_name?></td>
											<td><?=$l->achievement_name?></td>
											<td><a href="<?=base_url()?>recruitment/deleteOprecAch/<?=$l->id_oprec_achievement?>/<?=$l->id_oprec_gen?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus</a></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>	
					</div>
			</div>
			<a href="<?=base_url()?>recruitment/step4/<?=$kode?>" class="btn btn-primary btn-danger  login-button">Back</a>
			<a href="<?=base_url()?>recruitment/step6/<?=$kode?>" class="btn btn-primary btn-success login-button" onClick="return confirm('Are you sure lads?')">Next</a>
