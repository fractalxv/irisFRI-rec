
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">
									Assess The Candidate			
							</div>
							<div class="panel-body">
								<div id="stream_list">
						<?= form_open('assessment/reqAssess/');?>
							<div class="form-group">
								<p class="help-block">
								<b>
								Choose your recruitment to proceed and choose wisely
								</b>
								</p>
                            </div>
							<div class="form-group">
                                <label>Recruitment</label>
								<br>
                                <select data-placeholder="Recruitment Type" name="r" id="master" class="form-control chosen-select" tabindex="2" required>
									<option value=""></option>
									<?php
									foreach($or as $a){
									?>	
									<option value="<?=$a->id_oprec?>"><?='('.$a->run_year.' '.$a->semester.') '.$a->labwork_name?></option>
									<?php } ?>
								</select>
								<p class="help-block">Choose the recruitment first</p>								
                            </div>						
                            <div class="form-group">
                                <label>Assessment Phase</label><br>
                                <select id="child" name="ap" class="form-control chosen-select">
                                    <option value=""></option>
                                    <?php
									foreach($ap as $b){
									?>	
									<option value="<?=$b->id_as?>"><?= $b->as_name ?></option>
									<?php } ?>
                                </select>	
                                <p class="help-block">Choose the assessment phase</p>	
                            </div>				
                            <button type="submit" class="btn btn-success">Proceed</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
						<?= form_close(); ?>
								</div>
							</div>
						</div>	
					</div>
			</div>
            <!--script>
				// ini menyiapkan dokumen agar siap grak :)
				$(document).ready(function(){
					// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
					$('#master').change(function(){
						// membuat variabel id, nilainya dari attribut id pada button
						//var id = $(this).attr("id");
                        var id = {idoprec:$("#master").val()}
						var url = '<?php echo site_url("assessment/getChainAs/"); ?>';
						// memulai ajax
						$.ajax({
							url: url,	// set url -> ini file yang menyimpan query tampil detail 
                            data: {idoprec : $("#master").val()},
                            dataType: "json",
							type: 'POST',		
							success:function(data){		// kode dibawah ini jalan kalau sukses
								$('#child').html(data.lis);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
								//$('#validSAS').modal("show");	// menampilkan dialog modal nya
                                $("#child").trigger("chosen:updated");
							},
                            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                            }
						});
					});
				});
			</script>         		