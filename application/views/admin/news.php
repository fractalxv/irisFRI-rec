<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
										Post Recruitment News		
							</div>
							<div class="panel-body">
									<div id="stream_list">
									<?= form_open('database/addDataKK');?>
										<div class="form-group">
											<p class="help-block">
											<b>
											Click here to create new post
											</b>
											</p>
										</div>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> New Post</button>
									<?= form_close(); ?>
									</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									News
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Date</th>
											<th>Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($n as $ro){ ?>
										<tr>	
											<td><?=$ro->date?></td>
											<td><a href="#" data-toggle="modal" data-target="#myModal<?=$ro->id_news?>"><?=$ro->news_title?><a/></td>
											<td>
                                            <a href="<?=base_url()?>admin/deleteNews/<?=$ro->id_news?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun"> <i class="fa fa-trash"></i> Hapus</a>
                                            </td>
										</tr>	
										<div class="modal fade" id="myModal<?=$ro->id_news?>" role="dialog">
											<div class="modal-dialog">
											
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">News</h4>
												</div>
												<div class="modal-body">
													<div id="stream_list">
														<div class="form-group">
															<label>Post Date</label>: <?=date('d F Y',strtotime($ro->date))?> <br>
															<label>Title</label>: <?=$ro->news_title?> <br>
															<p><?=$ro->news_content?></p> <br>
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
							<h4 class="modal-title">Create Post</h4>
							</div>
							<div class="modal-body">
								<div id="stream_list">
									<?= form_open('admin/requestNews/');?>
										<div class="form-group">
											<p class="help-block">
											<b>
											Insert information about the new post
											</b>
											</p>
										</div>							
										<div class="form-group">
											<label>Title</label>
											<input type="text" class="form-control" name="title" required >
											<p class="help-block">Give your post a title</p>								
										</div>									
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" name="cont" required ></textarea>
											<p class="help-block">Add the content here</p>								
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