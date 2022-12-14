			<?= form_open('recruitment/requestStep3');?>
			<div class="row">
				<h1>STEP 3 - Organization Experience</h1>
				<p>Please fill your organization experience for the last 3 years</p>
					<div class="col-lg-4">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Add Experience
							</div>
							<input type="hidden" name="kode" value="<?=$kode?>">
		
							<div class="panel-body">
								<div id="stream_list">
									<div class="form-group">
										<label>Year</label>
										<input class="form-control"  type="text" name="year" >							
										<p class="help-block">Fill the year</p>								
									</div>
									<div class="form-group">
										<label>Organization Name</label>
										<input class="form-control"  type="text" name="org" >							
										<p class="help-block">Fill your organization name</p>								
									</div>
									<div class="form-group">
										<label>Position</label>
										<input class="form-control"  type="text" name="pos" >							
										<p class="help-block">Fill the position</p>								
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
									Organization Experience
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Organization Name</th>
											<th>Position</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($og as $l){ ?>
										<tr>
											<td><?=$l->year?></td>
											<td><?=$l->org_name?></td>
											<td><?=$l->position?></td>
											<td><a href="<?=base_url()?>recruitment/deleteOprecOrg/<?=$l->id_oprec_org?>/<?=$l->id_oprec_gen?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus</a></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>	
					</div>
			</div>
			<a href="<?=base_url()?>recruitment/step2/<?=$kode?>" class="btn btn-primary btn-danger  login-button">Back</a>
			<a href="<?=base_url()?>recruitment/step4/<?=$kode?>" class="btn btn-primary btn-primary login-button" onClick="return confirm('Are you sure lads?')">Next</a>