<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <?=$this->session->userdata('nama')?>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							
							<li>
							<a href="" class="switch_language" rel="eng"> <i class="fa fa-flag fa-fw"></i> Login As : <?=$this->session->userdata('lvname')?></a>
							</li>

							<li class="divider"></li>
							<a href="<?=base_url()?>cpanel/editMyAccount/<?=$this->session->userdata('id_user')?>" class="switch_language" rel="eng"> <i class="fa fa-pencil fa-fw"></i> Edit Account</a>
							</li>						
						   
							<li class="divider"></li>
							<li><a href="<?=base_url()?>main/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>

					</li>

				</ul>