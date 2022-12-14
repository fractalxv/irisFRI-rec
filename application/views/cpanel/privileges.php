<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Tambah Hak Akses			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/requestPrivileges');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Perhatian! tombol ini digunakan untuk menambahkan hak akses untuk user
								</b>
								</p>
                            </div>
							<div class="form-group">
                                <label>Module</label>
								<br>
								<input type="hidden" name="id" value="<?=$id->id_level?>">
                                <select data-placeholder="Modul" name="pv" class="form-control chosen-select" tabindex="2" required>
									<option value=""></option>
									<?php
									foreach($md as $a){
									?>	
									<option value="<?=$a->id_pm?>"><?=$a->module_name?></option>
									<?php } ?>
								</select>
								<p class="help-block">Pilih Level akses</p>								
                            </div>
                            <button type="submit" class="btn btn-default" onClick="return confirm('Apakah anda yakin?')">Tambah Hak Akses</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							 <div class="panel-heading">
									List Hak Akses di dalam Sistem	
							</div>
							<div class="panel-body">
								<table id="example" class="display table table-hover">
									<thead>
										<tr>
											<th>Nama Modul</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($mn as $l){ ?>
										<tr>
											<td><?=$l->module_name?></td>	
											<td>
											<a href="<?=base_url()?>cpanel/deletePrivileges/<?=$l->id_up?>" onClick="return confirm('Apakah anda yakin?')" title="Detail Menu">Hapus Akses</a>
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