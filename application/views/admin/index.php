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
											<th>Start Date</th>
											<th>End Date</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($or as $ro){ ?>
											<td><?=$ro->laboratory_name?></td>
											<td><?=$ro->start_date?></td>
											<td><?=$ro->end_date?></td>
											<td><?=$ro->description?></td>
											<td>
											<?php
											$q=$this->dbs->checkOG($ro->id_oprec,$this->session->userdata('username'))->row();
											if($q==NULL){
											?>
											<a href="<?=base_url()?>recruitment/apply/<?=$ro->id_oprec?>" onClick="return confirm('Are You Sure?')" title="Apply for Recruitment">Apply</a> |
											<a href="<?=base_url()?>recruitment/deleteEnroll/<?=$ro->id_oprec?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus</a>
											<?php
											}else{
												echo'Applied';
											}
											?>
											</td>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>
				