<div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">						
						<li>
							<div style="margin:8px;">
								<center>
									<img src="<?=base_url()?>themes/admin/images/fri.png" width="200"  style="border-radius: 15px;">
								</center>
							</div>
						</li>
						<?php
							$level=$this->session->userdata('lv');
							$menu = $this->model_general->getMenu($level)->result();
							foreach($menu as $m):
							$id = $m->id;
							$data = $this->model_general->getChildMenu($id);
							$x = $data->result();
							$s = $data->num_rows();
							if ($s != NULL){
						?>
						<li>
							<a title="click to view menu" href="#" style="color:#000000;">
								<?=$m->menu_name?>
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level collapse">
								<?php foreach($x as $n): ?>
								<li>
									<a href="<?=base_url()?><?=$n->url?>" style="color:#000000;">
									<?=$n->menu_name?>
									</a>
								</li>
								<?php endforeach?>	
							</ul>
						</li>
						 <?php } else { ?>
						<li>
							<a title="click to view menu" href="<?=base_url()?><?=$m->url?>" style="color:#000000;">
								<?=$m->menu_name?>
							</a>
						</li>
						<?php } endforeach ?>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>