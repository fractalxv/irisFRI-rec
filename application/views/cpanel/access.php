<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									List Hak Akses di dalam Sistem	
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Nama Level</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($mn as $l){ ?>
										<tr>
											<td><?=$l->level_name?></td>	
											<td>
											<a href="<?=base_url()?>cpanel/detailLevel/<?=$l->id_level?>" onClick="return confirm('Apakah anda yakin?')" title="Detail Menu">Detail Menu</a>
											</td>												
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>