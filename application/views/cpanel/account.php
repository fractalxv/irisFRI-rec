<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Generate Username untuk Mahasiswa			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/addAccount');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Perhatian! tombol ini digunakan untuk membuat username baru di dalam sistem
								</b>
								</p>
                            </div>
                            <button type="submit" class="btn btn-default" onClick="return confirm('Apakah anda yakin?')">Tambah Akun</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							 <div class="panel-heading">
									List Akun di dalam Sistem	
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Username</th>
											<th>Display Name</th>
											<th>Level Akses</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($acc as $l){ ?>
										<tr>
											<td><?=$l->username?></td>
											<td><?=$l->display_name?></td>		
											<td><?=$l->level_name?></td>
											<td>
											<a href="<?=base_url()?>cpanel/editAccount/<?=$l->id_user?>" onClick="return confirm('Apakah anda yakin?')" title="Edit Detail Akun">Edit Akun</a>
											|
											<a href="<?=base_url()?>cpanel/deleteAccount/<?=$l->id_user?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus Akun">Hapus Akun</a>
											</td>												
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>