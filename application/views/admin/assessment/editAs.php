<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Assessment</h4>
							</div>
                            <?= form_open('assessment/requestEditAs/');?>
							<div class="modal-body">
								<div id="stream_list">
									
										<div class="form-group">
											<p class="help-block">
											<b>
											Insert information about the assessment
											</b>
											</p>
										</div>
										<div class="form-group">
											<label>Assessment Name</label>
											<input class="form-control"  type="text" name="an" value="<?=$q->as_name?>" required>
											<input class="form-control"  type="hidden" name="id" value="<?=$idas?>">
											<input class="form-control"  type="hidden" name="ido" value="<?=$q->id_oprec?>">
											<p class="help-block">Give the assessment some name, ex: MBTI Test</p>								
										</div>
                                        <div class="form-group">
											<label>Start Date</label>
											<input class="form-control"  type="text" id="datetimepicker2" name="ds" value="<?=$q->as_date?>" required>
											<p class="help-block">Set the date for the assessment</p>								
										</div>
										<div class="form-group">
											<label>Minimum Score</label>
											<input class="form-control"  type="text" name="sc" value="<?=$q->pass_score?>" required>
											<p class="help-block">Fill the minimum score to pass this assessment, . ex: 50.<b> if the assessment doesn't include in the scoring then just give 0 lads </b></p>								
										</div>
										<div class="form-group">
											<label>Weight</label>
											<input class="form-control"  type="text" name="w" value="<?=$q->as_weight?>" required>
											<p class="help-block">Set the weight for the assesment, max is 100%</p>								
										</div>
										<div class="form-group">
											<label>Order</label>
											<input class="form-control"  type="text" name="or" value="<?=$q->as_order?>" required>
											<p class="help-block">Fill the order to display in sequencial</p>								
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" name="desc" required ><?=$q->as_desc?></textarea>
											<p class="help-block">Add description</p>								
										</div>									
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn-primary  login-button">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									
							</div>
                            <?= form_close(); ?>