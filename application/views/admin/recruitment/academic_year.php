				<div class="row">
				    <div class="col-lg-6">
				        <div class="panel panel-default">
				            <div class="panel-heading">
				                Create Tahun
				            </div>
				            <div class="panel-body">
				                <div id="stream_list">
				                    <?= form_open('database/addyear'); ?>
				                    <div class="form-group">
				                        <p class="help-block">
				                            <b>
				                                Click here to create new year
				                            </b>
				                        </p>
				                    </div>
				                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> New Year</button>
				                    <?= form_close(); ?>
				                </div>
				            </div>
				        </div>
				    </div>

				    <!-- konten tabel -->
				    <div class="col-lg-12">
				        <div class="panel panel-default">
				            <div class="panel-heading">
				                Tambah Tahun dan Semester Open Recruitment
				            </div>
				            <div class="panel-body">
				                <table id="example" class="display table table-hover">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Semester</th>
				                            <th>Run Year</th>
				                            <th>Action</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <?php $no = 1;
                                        foreach ($year as $y) { ?>
				                            <tr>
				                                <td><?= $no++ ?></td>
				                                <td><?= $y->semester ?></td>
				                                <td><?= $y->run_year ?></td>
				                                <td>
				                                    <a href="<?= base_url() ?>database/deleteYear/<?= $y->id_ay ?>" onClick="return confirm('Apakah anda yakin?')" title="Hapus"> <i class="fa fa-trash"></i> Hapus Data</a>
				                                </td>
				                            </tr>
				                        <?php } ?>
				                    </tbody>
				                </table>
				            </div>
				        </div>
				    </div>
				    <style>
				        .chosen-container {
				            width: 100% !important;
				        }
				    </style>
				    <div class="modal fade" id="myModal" role="dialog">
				        <div class="modal-dialog">

				            <!-- Modal content-->
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title">Create Open Recruitment</h4>
				                </div>
				                <div class="modal-body">
				                    <div id="stream_list">
				                        <?= form_open('database/requestYear/'); ?>
				                        <div class="form-group">
				                            <p class="help-block">
				                                <b>
				                                    Insert information about the Open Recruitment Year
				                                </b>
				                            </p>
				                        </div>
				                        <div class="form-group">
				                            <label>Semester</label>
				                            <textarea class="form-control" name="semester" required></textarea>
				                        </div>
				                        <div class="form-group">
				                            <label>Run Year</label>
				                            <textarea class="form-control" name="runyear" required></textarea>
				                        </div>
				                    </div>
				                </div>
				                <div class="modal-footer">
				                    <button type="submit" class="btn btn-primary btn-primary  login-button">Submit</button>
				                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                    <?= form_close(); ?>
				                </div>
				            </div>

				        </div>
				    </div>
				</div>