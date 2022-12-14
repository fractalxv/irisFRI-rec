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
											<th>Start Date</th>
											<th>End Date</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($or as $ro){ ?>
											<tr>
												<td><?=$ro->start_date?></td>
												<td><?=$ro->end_date?></td>
												<td><?=$ro->description?></td>
												<td>
													<a href="<?=base_url()?>admin/oprecDetail/<?=$ro->id_oprec?>" class="btn btn-sm btn-primary login-button" onClick="return confirm('Are you sure lads?')"><i class="fa fa-search"></i> Detail</a>
													
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>
				