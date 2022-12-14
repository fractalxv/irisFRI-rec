
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Edit User Account			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('cpanel/updateMyAccount/');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Masukan data terkait akun yang akan dibuat di dalam sistem. 
								</b>
								</p>
                            </div>
							<div class="form-group">
                                <label>Username</label>
                                <input class="form-control"  name="uname" maxlength="50" required value="<?=$acc->username?>" readonly>
								<input class="form-control"  name="id" maxlength="50"  value="<?=$acc->id_user?>" type="hidden">
								<p class="help-block">Masukan username</p>
                            </div>
							<div class="form-group">
                                <label>Display Name</label>
                                <input class="form-control"  name="dname" required value="<?=$acc->display_name?>" readonly>
								<p class="help-block">Msukan nama yang akan tertera di display</p>
                            </div>
							<div class="form-group">
                                <label>Password Baru</label>
                                <input class="form-control"  name="pass" minlength="6" type="password" id="minle" required>
								<p class="help-block">Masukan password, min. 6 huruf</p>
                            </div>
							<div class="form-group">
                                <label>Ketik Ulang Password Baru</label>
                                <input class="form-control"  name="rpass" minlength="6"  type="password" required>
								<p class="help-block">Ketik ulang password</p>
                            </div>						
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>	
					</div>

			</div>                		