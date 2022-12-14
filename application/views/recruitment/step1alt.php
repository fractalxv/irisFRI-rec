				<div class="row">
					<h1>STEP 1 - Basic Info</h1>
					<p>Please fill basic information honestly.</p>
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Lab Application Form : <?=$q->id_oprec_gen?>
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('Recruitment/requestUpdateStep1/');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Insert Your Data Here
								</b>
								</p>
                            </div>
							<input type="hidden" name="kode" value="<?=$q->id_oprec_gen?>">
							<div class="form-group">
								<label for="pwd">Life Motto</label>
								<input class="form-control"  type="text" name="motto" value="<?=$q->motto?>" required>
								<p class="help-block">Because you must have one life motto afterall, oh the choosen one!</p>
							</div>
							<div class="form-group">
								<label for="pwd">Latest GPA</label>
								<input class="form-control"  type="text" name="gpa" value="<?=$q->gpa?>" required>
								<p class="help-block">Don't be shy, just type your real GPA with dignity! (ex: 3.99)</p>
							</div>
							<div class="form-group">
                                <label>Motivation for being the Next Big Things AKA Ensyse Assistant</label>
								<textarea class="form-control" name="motiv" required ><?=$q->motivation?></textarea>
								<p class="help-block">Describe your motivation for applying the position in a swift! not taylor swift of course LOL</p>						
                            </div>
							<div class="form-group">
									   <label>Your major</label>
										<br>
										<select data-placeholder="Pilih" name="maj" class="form-control chosen-select" tabindex="2" required>
											<option value="<?=$q->id_major?>"><?=$q->major_name?></option>
											<?php
											foreach($m as $j){
												if($j->id_major!=$q->id_major){
											?>	
											<option value="<?=$j->id_major?>"><?=$j->major_name?></option>
											<?php }} ?>
										</select>
										<p class="help-block">Choose your major</p>								
									</div>															
							<div class="form-group">
								<label>Laboratory Target</label>
								<br>
								<select data-placeholder="Select Laboratory"  name="lab" class="form-control chosen-select" tabindex="2">
									<option value="<?=$q->id_lab?>"><?=$q->laboratory_name?></option>
									<?php
										foreach($lab as $nu){
											if($nu->id_lab!=$q->id_lab){
									?>	
									<option value="<?=$nu->id_lab?>"><?=$nu->laboratory_name?> (<?=$nu->short_name?>)</option>
									<?php } }?>
								</select>
								<p class="help-block">Select laboratory that you desire oh young lads!</p>								
							</div>															
                            <button type="submit" class="btn btn-default">Next</button>
                            <button type="reset" class="btn btn-default">Reset</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>	
					</div>
			</div>	