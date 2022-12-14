
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Generate Menu			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/requestEditMenu/');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Masukan data terkait menu yang akan dibuat di dalam sistem. 
								</b>
								</p>
                            </div>
							<div class="form-group">
                                <label>Nama Menu</label>
                                <input class="form-control"  name="mname" maxlength="50" required value="<?=$mn->menu_name?>">
								<input class="form-control"  name="id" maxlength="50" type="hidden" value="<?=$mn->id?>">
								<p class="help-block">Masukan nama menu</p>
                            </div>
							<div class="form-group">
                                <label>Module</label>
								 <input class="form-control"  readonly value="<?=$mn->module_name?>">
								<br>
                                <select data-placeholder="Module" name="md" class="form-control chosen-select" tabindex="2" required>
									<option value=""></option>
									<?php
									foreach($md as $a){
									?>	
									<option value="<?=$a->id_pm?>"><?=$a->module_name?></option>
									<?php } ?>
								</select>
								<p class="help-block">Pilih Module</p>								
                            </div>						
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>	
					</div>
					<!--div class="col-lg-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								Akun				
							</div>
							<div class="panel-body">
								<div class="list-group" style="font-size:12px;">
									<a style="color:#fff;background:#C8303D;" href="<?=base_url()?>themes/login/http://igracias.telkomuniversity.ac.id/index.php?pageid=2941#" class="list-group-item change_username" onclick="currentUsername=62441"> The Legendary Fulan</a>				
								</div>
							</div>
						</div>		 
						<div class="panel panel-default">
							<div class="panel-heading">Login Terakhir</div>
							<div class="panel-body">
								<div class="list-group">
									<div id="sidebar_link_title">Pada 09 JAN 2015 09:28:30<br></div><div id="sidebar_link_title">Alamat IP 10.3.248.118<br></div><div id="sidebar_link_title">Browser Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Maxthon/4.3.2.1000 Chrome/30.0.1599.101 Safari/537.36<br><br><a href="<?=base_url()?>themes/login/"><b> View Detail </b></a></div>				
								</div>
							</div>
						</div>
					</div-->	
			</div>                		