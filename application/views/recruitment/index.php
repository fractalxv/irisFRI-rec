<script>
	function refreshChildWindow() {
		if (!childWindow) {
			alert("There is no child window open.");
		} else {
			childWindow.location.reload();
		}
	}
</script>
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">

			</div>
			<div class="panel-body">
				<div id="stream_list">
					<div class="form-group">
						<p class="help-block">
							<b>

							</b>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Biography Information
			</div>
			<div class="panel-body">
				<table class="table table-bordered ">
					<tr>
						<td class="width30">NIM:</td>
						<td class="width70"><strong><?= $r->nim ?></strong></td>
					</tr>
					<tr>
						<td class="width30">Student Name:</td>
						<td class="width70"><strong><?= ucwords(strtolower($r->student_name)) ?></strong></td>
					</tr>
					<tr>
						<td class="width30">Address:</td>
						<td class="width70"><strong><?= $r->alamat ?></strong></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><strong><?= $r->email ?></strong></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><strong><?= $r->tlp ?></strong></td>
					</tr>
				</table>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Recent News From Faculty
			</div>
			<div class="panel-body">
				<table id="ex" class="display table table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th>News</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($news as $n) { ?>
								<td><?= $n->date ?></td>
								<td><?= $n->news_title ?></td>
								<td><?= $n->news_content ?></td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				My Recruitment Information
			</div>
			<div class="panel-body">
				<table id="example" class="display table table-hover">
					<thead>
						<tr>
							<th>Recruitment ID</th>
							<th>Labwork</th>
							<th>Laboratory</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($og as $l) { ?>
							<tr>
								<td><?= $l->id_oprec_gen ?></td>
								<td>
									<?php
									$q = $this->dbs->getViewOprec($l->id_oprec)->row();
									if ($q == NULL) {
										echo 'Recruitment Expired';
									} else {
										echo $q->labwork_name;
									}
									?>
								</td>
								<td><?= $l->laboratory_name ?></td>
								<td>
									<?php
									$a = $this->dbs->getOGByOG($l->id_oprec_gen)->row();
									$b = $this->dbs->getOprecEdu($l->id_oprec_gen)->row();
									$c = $this->dbs->getOprecOrg($l->id_oprec_gen)->row();
									$d = $this->dbs->getOprecSkills($l->id_oprec_gen)->row();
									$e = $this->dbs->getOprecAch($l->id_oprec_gen)->row();
									if ($a == NULL || $b == NULL || $c == NULL || $d == NULL || $e == NULL) { ?>
										On Going
									<?php
									} else {
										$q = $this->dbs->getOGByOG($l->id_oprec_gen)->row();
										echo $q->status_name;
									}
									?>
								</td>
								<td>
									<a href="<?= base_url() ?>recruitment/step1/<?= $l->id_oprec ?>/<?= $l->id_oprec_gen ?>" class="btn btn-sm btn-primary login-button" onClick="return confirm('Are you sure lads?')"><i class="fa fa-edit"></i> Edit</a>

									<a href="<?= base_url() ?>recruitment/applicantDetail/<?= $l->id_oprec_gen ?>" class="btn btn-sm btn-info" onClick="return confirm('Are you sure lads?')"> <i class="fa fa-search"></i> Detail</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>