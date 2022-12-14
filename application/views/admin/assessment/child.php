                            <div class="form-group">
                                <label>Assessment Phase</label>
								<br>
                                <select data-placeholder="Assessment Phase" name="ap" class="form-control chosen-select" tabindex="2" required>
									<option value=""></option>
                                    <?php
									foreach($as as $a){
									?>	
									<option value="<?=$a->id_as?>"><?=$a->as_name?></option>
									<?php } ?>
								</select>
								<p class="help-block">Choose the assessment phase</p>								
                            </div>