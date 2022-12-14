<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Generate Child Menu Baru			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/addChildMenu');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Perhatian! tombol ini digunakan untuk membuat menu baru di dalam sistem
								</b>
								</p>
								<input type="hidden" value="<?=$id?>" name="id">
                            </div>
                            <button type="submit" class="btn btn-default" onClick="return confirm('Apakah anda yakin?')">Tambah Child Menu</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							 <div class="panel-heading">
									List Child Menu di dalam Sistem	
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Nama Menu</th>
											<th>Alamat URL</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($mn as $l){ ?>
										<tr>
											<td><a href="<?=base_url()?>cpanel/childDetail/<?=$l->id?>"><?=$l->menu_name?></a></td>	
											<td><?=$l->url?></td>
											<td>
											<a href="<?=base_url()?>cpanel/editChildMenu/<?=$l->id?>/<?=$l->parent_id?>" onClick="return confirm('Apakah anda yakin?')" title="Edit Detail Menu">Edit Menu</a>
											|
											<a href="<?=base_url()?>cpanel/deleteMenu/<?=$l->id?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Menu">Hapus Menu</a>
											</td>												
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
						<button type="submit" class="btn btn-default" onClick="history.back()">Kembali</button>
					</div>	
				</div>