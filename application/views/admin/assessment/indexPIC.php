<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Open Recruitment For :	<?=$lab->laboratory_name?>	Laboratory			
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Academic Year</th>
											<th>Labwork Name</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($or as $ro){ ?>
											<tr>
												<td><?=$ro->run_year.' '.$ro->semester?></td>
												<td><?=$ro->labwork_name?></td>
												<td><?=$ro->description?></td>
												<td>
													<a href="<?=base_url()?>assessment/assessmentDetail/<?=$ro->id_oprec?>" class="btn btn-sm btn-success login-button" onClick="return confirm('Are you sure lads?')"><i class="fa fa-pencil"></i> Assessment Setup</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>
				