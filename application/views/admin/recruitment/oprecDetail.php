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
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<h1><?=$n?></h1>
										<div>Applicant</div>
									</div>
								</div>
							</div>
						</div>
				 </div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Open Recruitment Information			
							</div>
							<div class="panel-body">
								<table class="table table-bordered ">
									<tr>
										<td class="width30">Laboratory:</td>
										<td class="width70"><strong><?=$l->laboratory_name?></strong></td>
									</tr>
									<tr>
										<td class="width30">Start Date:</td>
										<td class="width70"><strong><?=$o->start_date?></strong></td>
									</tr>
									<tr>
										<td class="width30">End Date:</td>
										<td class="width70"><strong><?=$o->end_date?></strong></td>
									</tr>
							   </table>
								</table>
							</div>
						</div>		 
					</div>	
			</div>
			<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Information			
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>NIM</th>
											<th>Name</th>
											<th>Recruitment ID</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($g as $l){ ?>
										<tr>
											<td><?=$l->nim?></td>
											<td><?=$l->student_name?></td>
											<td><?=$l->id_oprec_gen?></td>
											<td>
												<a href="<?=base_url()?>recruitment/step1/<?=$l->id_oprec_gen?>" class="btn btn-sm btn-primary login-button" onClick="return confirm('Are you sure lads?')"><i class="fa fa-edit"></i> Edit</a>
												<a href="<?=base_url()?>recruitment/applicantDetail/<?=$l->id_oprec_gen?>" class="btn btn-sm btn-info" onClick="return confirm('Are you sure lads?')" target="_blank"> <i class="fa fa-search"></i> Detail</a>
												<!--a href="<?=base_url()?>recruitment/deleteApplicant/<?=$l->id_oprec_gen?>/<?=$o->id_oprec?>" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure lads?')" target="_blank"> <i class="fa fa-trash"></i> Delete</a-->
											</td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>		 
					</div>	
			</div>   	