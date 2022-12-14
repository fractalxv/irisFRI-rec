			<?= form_open('recruitment/requestStep4');?>
			<div class="row">
			<h1>STEP 4 - Software Skills</h1>
			<p>Please fill your software skills inforamtion that relevant for your application</p>
					<div class="col-lg-4">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Add Experience
							</div>
							<input type="hidden" name="kode" value="<?=$kode?>">
							<div class="panel-body">
								<div id="stream_list">
									<div class="form-group">
										<label>Software Name</label>
										<input class="form-control"  type="text" name="sname" >							
										<p class="help-block">Fill the software that you mastered young one!</p>								
									</div>
									<div class="form-group">
										<label>Expertise Level</label>
										<select data-placeholder="Select Expertise" name="slvl" class="form-control chosen-select" tabindex="2" required>
											<option value=""></option>
											<?php
											foreach($s as $nu){
											?>	
											<option value="<?=$nu->id_sl?>"><?=$nu->lvl_name?></option>
											<?php } ?>
										</select>						
										<p class="help-block">Don't be shy! just gauge your expert level</p>								
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
									Software Skills
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Software Name</th>
											<th>Skills Level</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($og as $l){ ?>
										<tr>
											<td><?=$l->software_name?></td>
											<td><?=$l->lvl_name?></td>
											<td><a href="<?=base_url()?>recruitment/deleteOprecSkills/<?=$l->id_oprec_skills?>/<?=$l->id_oprec_gen?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus</a></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>	
					</div>
			</div>
			<a href="<?=base_url()?>recruitment/step3/<?=$kode?>" class="btn btn-primary btn-danger  login-button">Back</a>
			<a href="<?=base_url()?>recruitment/step5/<?=$kode?>" class="btn btn-primary btn-primary login-button" onClick="return confirm('Are you sure lads?')">Next</a>