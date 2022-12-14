<script>
function refreshChildWindow() {
    if (!childWindow) {
      alert("There is no child window open.");
    }
    else {
      childWindow.location.reload();
    }
  }
  
 </script>
			<div class="row">
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
										$q = $this->dbs->getOprecFile($r->id_oprec_gen)->row();
										if ($q != NULL){
										?>
										<img src="<?=base_url().$q->photo_url?>" height ="180" >
										<?php
										}else{
										?>
										<b>
										Photo is not uploaded yet
										</b>
										<?php } ?>
										</p>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-5">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Biodata			
							</div>
							<div class="panel-body">
								<table class="table table-bordered ">
									<tr>
										<td class="width30">NIM:</td>
										<td class="width70"><strong><?=$mhs->nim?></strong></td>
									</tr>
									<tr>
										<td class="width30">Student Name:</td>
										<td class="width70"><strong><?=ucwords(strtolower($mhs->student_name))?></strong></td>
									</tr>
									<tr>
										<td class="width30">Address:</td>
										<td class="width70"><strong><?=$mhs->alamat?></strong></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><strong><?=$mhs->email?></strong></td>
									</tr>
									<tr>
										<td>Phone:</td>
										<td><strong><?=$mhs->tlp?></strong></td>
								   </tr>
							   </table>
								</table>
							</div>
						</div>		 
					</div>
					
					<div class="col-lg-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant General Information			
							</div>
							<div class="panel-body">
								<table class="table table-bordered ">
									<tr>
										<td class="width30">Motto:</td>
										<td class="width70"><strong><?=$r->motto?></strong></td>
									</tr>
									<tr>
										<td class="width30">GPA:</td>
										<td class="width70"><strong><?=$r->gpa?></strong></td>
									</tr>
									<tr>
										<td class="width30">Motivation:</td>
										<td class="width70"><strong><?=$r->motivation?></strong></td>
									</tr>
									<tr>
										<td class="width30">Additional File:</td>
										<?php
										$q = $this->dbs->getOprecFile($r->id_oprec_gen)->row();
										if ($q != NULL){
										?>
										<td class="width70"><strong><a href="<?=base_url().$o->khs_url?>"><?=$o->id_oprec_gen?></a></strong></td>
										<?php
										}else{
										?>
										<td class="width70"><strong><a>No File Uploaded</a></strong></td>
										<?php } ?>

									</tr>
							   </table>
								</table>
							</div>
						</div>		 
					</div>					
			</div>
			<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Education Information			
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Education</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($r1 as $re){ ?>
										<tr>
											<td><?=$re->year?></td>
											<td><?=$re->education?></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>		 
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Organization Experience
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Organization</th>
											<th>Position</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($r2 as $ro){ ?>
										<tr>
											<td><?=$ro->year?></td>
											<td><?=$ro->org_name?></td>
											<td><?=$ro->position?></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>		 
					</div>
			</div>  
			<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Skills Information
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Software Name</th>
											<th>Level</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($r3 as $rs){ ?>
										<tr>
											<td><?=$rs->software_name?></td>
											<td><?=$rs->lvl_name?></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>		 
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Achievement Information
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Year</th>
											<th>Type</th>
											<th>Achievement</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($r4 as $ra){ ?>
										<tr>
											<td><?=$ra->year?></td>
											<td><?=$ra->achievement_type_name?></td>
											<td><?=$ra->achievement_name?></td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>		 
					</div>					
			</div>			