			<?= form_open('recruitment/requestStep2');?>
			<div class="row">
				<h1>STEP 2 - Education</h1>
				<p>Please fill your education experience prior from elementary</p>
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
										<p class="help-block">Fill the year of your graduation</p>								
									</div>
									<div class="form-group">
										<label>Education</label>
										<input class="form-control"  type="text" name="edu" >							
										<p class="help-block">Fill the complete info about your education (ex: SMA Labschool, Bandung)</p>								
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
									Education Experience
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Education</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($og as $l){ ?>
										<tr>
											<td><?=$l->year?></td>
											<td><?=$l->education?></td>
											<td><a href="<?=base_url()?>recruitment/deleteOprecEdu/<?=$l->id_oprec_edu?>/<?=$l->id_oprec_gen?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus</a></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>	
					</div>
			</div>
			<a href="<?=base_url()?>recruitment/step1/<?=$kode?>" class="btn btn-primary btn-danger  login-button">Back</a>
			<a href="<?=base_url()?>recruitment/step3/<?=$kode?>" class="btn btn-primary btn-primary  login-button" onClick="return confirm('Are you sure lads?')">Next</a>