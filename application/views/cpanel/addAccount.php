
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Generate User Account			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/requestAccount/');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Masukan data terkait akun yang akan dibuat di dalam sistem. 
								</b>
								</p>
                            </div>
							<div class="form-group">
                                <label>Username</label>
                                <input class="form-control"  name="uname" maxlength="50" required>
								<p class="help-block">Masukan username</p>
                            </div>
							<div class="form-group">
                                <label>Display Name</label>
                                <input class="form-control"  name="dname" required>
								<p class="help-block">Msukan nama yang akan tertera di display</p>
                            </div>
							<div class="form-group">
                                <label>Password</label>
                                <input class="form-control"  name="pass" minlength="6" type="password" id="minle" required>
								<p class="help-block">Masukan password, min. 6 huruf</p>
                            </div>
							<div class="form-group">
                                <label>Ketik Ulang Password</label>
                                <input class="form-control"  name="rpass" minlength="6"  type="password" required>
								<p class="help-block">Ketik ulang password</p>
                            </div>
							<div class="form-group">
                                <label>Level</label>
								<br>
                                <select data-placeholder="Level Akses" name="lv" class="form-control chosen-select" tabindex="2" required>
									<option value=""></option>
									<?php
									foreach($level as $a){
									?>	
									<option value="<?=$a->id_level?>"><?=$a->level_name?></option>
									<?php } ?>
								</select>
								<p class="help-block">Pilih Level akses</p>								
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