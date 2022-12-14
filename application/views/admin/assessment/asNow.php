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
										<i class="fa fa-thumbs-o-up fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<h1></h1>
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
								Assessment Information			
							</div>
							<div class="panel-body">
								<table class="table table-bordered ">
									<tr>
										<td class="width30">Labwork</td>
										<td class="width70"><strong><?=$r->labwork_name?></strong></td>
									</tr>
									<tr>
										<td class="width30">Laboratory</td>
										<td class="width70"><strong><?=$lab->laboratory_name?></strong></td>
									</tr>
									<tr>
										<td class="width30">Assessment Name</td>
										<td class="width70"><strong><?=$as->as_name?></strong></td>
									</tr>
							   </table>
								</table>
							</div>
						</div>		 
					</div>	
			</div>
			<?= form_open('assessment/reqPushAs/');?>
			<input type="hidden" name="as" value="<?=$as->id_as?>" >
			<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Applicant Information			
							</div>
							<div class="panel-body">
								<table class="display table table-hover">
									<thead>
										<tr>
											<th>NIM</th>
											<th>Name</th>
											<th>Recruitment ID</th>
											<th>Score</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($g as $l){ ?>
										<tr>
											<td><?=$l->nim?></td>
											<td><?=$l->student_name?></td>
											<td><?=$l->id_oprec_gen?></td>
											<td>
												<input type="hidden" name="nim[]" value="<?=$l->nim?>" >
												<?php $sc=$this->dbs->viewASR2($ap,$r->id_lab,$l->nim)->row();
												if($sc==NULL){ ?>
												<input type="post" name="sc[]" >
												<?php }else { ?>
													<input type="post" name="sc[]" value="<?=$sc->score?>">
												<?php } ?>
											</td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
								
							</div>
						</div>		 
					</div>	
			</div>  
			<!--div class="row">
				<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Token		
							</div>
							<div class="panel-body">
								<table class="table table-bordered ">
									<tr>
										<td class="width30">Token Authentication</td>
										<td class="width70"><input type="post" name="token"></td>
									</tr>
							   </table>
								</table>
							</div>
						</div>
				</div>			
			</div-->
			<button type="submit" class="btn btn-lg btn-success">Submit</button> 	
			<a  onclick="history.go(-1);" title="Back to Previous" class="btn btn-lg btn-warning">Back</a> 
			<?= form_close(); ?>