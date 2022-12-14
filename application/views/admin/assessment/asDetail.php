<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
										Create Assesment		
							</div>
							<div class="panel-body">
									<div id="stream_list">
										<div class="form-group">
											<p class="help-block">
											<b>
											Click here to create new assesment
											</b>
											</p>
										</div>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> New Assesment</button>
									</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Assesment Test  ( Total Weight: <?=$w?>% )
                                    Status: <?php
                                        if($w==100){
                                           echo'<a style="color:green">OK</a>';
                                        }else{
                                            echo'<a style="color:red">NOT COMPLETE</a>';
                                        }
                                    ?>
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Start Date</th>
											<th>Assesment Name</th>
											<th>Weight</th>
											<th>Minimum Score</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($as as $ro){ ?>
										<tr>	
											<td><?=$ro->as_date?></td>
											<td><?=$ro->as_name?></td>
											<td><?=$ro->as_weight?>%</td>
											<td><?php if($ro->pass_score==0){echo"Not Include";}else{echo $ro->pass_score;}?></td>
											<td><?=$ro->as_desc?></td>
											<td>
                                            <a href="#" id="<?=$ro->id_as?>" onClick="return confirm('Are you sure lads?')" class="btn btn-sm btn-info login-button view_data" title="Detail" data-toggle="modal" data-target="#validSAS"> <i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?=base_url()?>assessment/deleteAs/<?=$ro->id_oprec?>/<?=$ro->id_as?>" onClick="return confirm('Are you sure lads?')" class="btn btn-sm btn-warning login-button" title="Delete Assessment"> <i class="fa fa-trash"></i> Hapus</a>
											</td>
										</tr>	
										<div class="modal fade" id="myModal<?=$ro->id_oprec?>" role="dialog">
											<div class="modal-dialog">
											
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Open Recruitment Detail</h4>
												</div>
												<div class="modal-body">
													<div id="stream_list">
														<div class="form-group">
															<label>Start Date</label>: <?=date('d F Y',strtotime($ro->start_date))?> <br>
															<label>End Date</label>:  <?=date('d F Y',strtotime($ro->end_date))?> <br>
															<label>Laboratory</label>: <br>
															<?php 
															$q= $this->dbs->getViewOprec($ro->id_oprec)->result();
															foreach($q as $w){
															?>
															<p>- <?=$w->laboratory_name?></p>
															<?php	
															} 
															?>
														</div>
																									
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
											
											</div>
										</div>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>
					<style>
						.chosen-container { width: 100% !important; }
					</style>
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
						
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Create New Assessment</h4>
							</div>
							<div class="modal-body">
								<div id="stream_list">
									<?= form_open('assessment/requestAs/');?>
										<div class="form-group">
											<p class="help-block">
											<b>
											Insert information about the assessment
											</b>
											</p>
										</div>
										<div class="form-group">
											<label>Assessment Name</label>
											<input class="form-control"  type="text" name="an" required>
											<input class="form-control"  type="hidden" name="id" value="<?=$idoprec?>">
											<p class="help-block">Give the assessment some name, ex: MBTI Test</p>								
										</div>
                                        <div class="form-group">
											<label>Start Date</label>
											<input class="form-control"  type="text" id="datetimepicker2" name="ds" required>
											<p class="help-block">Set the date for the assessment</p>								
										</div>
										<div class="form-group">
											<label>Minimum Score</label>
											<input class="form-control"  type="text" name="sc" required>
											<p class="help-block">Fill the minimum score to pass this assessment, . ex: 50.<b> if the assessment doesn't include in the scoring then just give 0 lads </b></p>								
										</div>
										<div class="form-group">
											<label>Weight</label>
											<input class="form-control"  type="text" name="w" required>
											<p class="help-block">Set the weight for the assesment, max is 100%</p>								
										</div>
										<div class="form-group">
											<label>Order</label>
											<input class="form-control"  type="text" name="or" required>
											<p class="help-block">Fill the order to display in sequencial</p>								
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" name="desc" required ></textarea>
											<p class="help-block">Add description</p>								
										</div>									
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn-primary  login-button">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<?= form_close(); ?>
							</div>
						</div>
						
						</div>
					</div>
			</div>	
            <div class="modal fade" id="validSAS" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">			
						<div id="data-content">

						</div>
					</div>
				</div>
			</div>
            <script>
				// ini menyiapkan dokumen agar siap grak :)
				$(document).ready(function(){
					// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
					$('.view_data').click(function(){
						// membuat variabel id, nilainya dari attribut id pada button
						var id = $(this).attr("id");
						var url = '<?php echo site_url("assessment/editAssessment/"); ?>'+'/'+id;
						// memulai ajax
						$.ajax({
							url: url,	// set url -> ini file yang menyimpan query tampil detail 
							type: 'get',		
							success:function(data){		// kode dibawah ini jalan kalau sukses
								$('#data-content').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
								//$('#validSAS').modal("show");	// menampilkan dialog modal nya
							}
						});
					});
				});
			</script>		