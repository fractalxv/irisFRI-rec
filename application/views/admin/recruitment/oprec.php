				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Create Open Recruitment
							</div>
							<div class="panel-body">
								<div id="stream_list">
									<?= form_open('database/addDataKK'); ?>
									<div class="form-group">
										<p class="help-block">
											<b>
												Click here to create new recruitment for laboratories
											</b>
										</p>
									</div>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> New Open Recruitment</button>
									<?= form_close(); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Open Recruitment
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
										<?php foreach ($or as $ro) { ?>
											<tr>
												<td><?= $ro->start_date ?></td>
												<td><?= $ro->end_date ?></td>
												<td><?= $ro->description ?></td>
												<td>
													<?php
													$q = $this->dbs->checkOG($ro->id_oprec, $this->session->userdata('username'))->row();
													if ($q == NULL) {
													?>
														<a href="#" data-toggle="modal" data-target="#myModal<?= $ro->id_oprec ?>" title="Detail"> <i class="fa fa-search"></i> Detail</a> |
														<a href="<?= base_url() ?>recruitment/deleteEnroll/<?= $ro->id_oprec ?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun"> <i class="fa fa-trash"></i> Hapus</a>
													<?php
													} else {
														echo 'Applied';
													}
													?>
												</td>
											</tr>
											<div class="modal fade" id="myModal<?= $ro->id_oprec ?>" role="dialog">
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
																	<label>Start Date</label>: <?= date('d F Y', strtotime($ro->start_date)) ?> <br>
																	<label>End Date</label>: <?= date('d F Y', strtotime($ro->end_date)) ?> <br>
																	<label>Laboratory</label>: <br>
																	<?php
																	$q = $this->dbs->getViewOprec($ro->id_oprec)->result();
																	foreach ($q as $w) {
																	?>
																		<p>- <?= $w->laboratory_name ?></p>
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
						.chosen-container {
							width: 100% !important;
						}
					</style>
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Create Open Recruitment</h4>
								</div>
								<div class="modal-body">
									<div id="stream_list">
										<?= form_open('admin/requestOprec/'); ?>
										<div class="form-group">
											<p class="help-block">
												<b>
													Insert information about the Open Recruitment
												</b>
											</p>
										</div>
										<div class="form-group">
											<label>Academic Year</label>
											<br>
											<select data-placeholder="Academic Year" name="ay" class="form-control chosen-select" tabindex="2" required>
												<option value=""></option>
												<?php
												foreach ($ay as $a) {
												?>
													<option value="<?= $a->id_ay ?>"><?= $a->semester ?> (<?= $a->run_year ?>)</option>
												<?php } ?>
											</select>
											<p class="help-block">Select Academic Year</p>
										</div>
										<div class="form-group">
											<label>Labwork</label>
											<br>
											<select data-placeholder="Select Labwork" name="lw" class="form-control chosen-select" tabindex="2" required>
												<option value=""></option>
												<?php
												foreach ($lw as $nu) {
												?>
													<option value="<?= $nu->id_labwork ?>"><?= $nu->short_name ?> - <?= $nu->labwork_name ?></option>
												<?php } ?>
											</select>
											<p class="help-block">Select Labwork that you desire</p>
										</div>
										<div class="form-group">
											<label>Start Date</label>
											<input class="form-control" type="text" id="datetimepicker2" name="ds" required>
											<p class="help-block">Set Start Date</p>
										</div>
										<div class="form-group">
											<label>End Date</label>
											<input class="form-control" type="text" id="datetimepicker3" name="de" required>
											<p class="help-block">Set End Date</p>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" name="desc" required></textarea>
											<p class="help-block">Add Description</p>
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