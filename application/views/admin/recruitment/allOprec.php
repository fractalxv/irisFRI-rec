				<div class="row">

					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Open Recruitment 
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Laboratory</th>
											<th>Labwork</th>
											<th>Description</th>
											<th>Applicant</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($or as $ro){ ?>
										<tr>	
											<td><?=$ro->short_name?></td>
											<td><?=$ro->labwork_name?></td>
											<td><?=$ro->description?></td>
											<td><?= $q=$this->dbs->getCandidateByOG($ro->id_oprec)->num_rows();?></td>
											<td>
											<a href="<?=base_url()?>admin/oprecDetailAdm/<?=$ro->id_oprec?>/<?=$ro->id_lab?>" class="btn btn-sm btn-primary login-button" onClick="return confirm('Are you sure lads?')"><i class="fa fa-search"></i> Detail</a>
											</td>
										</tr>	
										<?php } ?>
									</tbody>
								</table>	
							</div>
						</div>
					</div>
				</div>