<?php 
	$sy = $_GET['sy'];
	$grade_id = $_GET['grade_id'];
	$group_by = $_GET['group_by'];
?>			

			<section class="content-header">
                    <h1>
						Profile  
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
		<div class="col-lg-12">
			<?php include('archives_menu.php'); ?>
			<?php include('archives_profile_modal.php'); ?>		
			<hr class="hr">
		</div>
		<div class="col-lg-12">
				<?php if($group_by == 'all'){ ?>
							<?php
								foreach($system->profile_list() as $p_row){
								$group_by = $p_row['group_by'];
								$group_by_label = $p_row['group_by_label'];
								?>
								<div class="row">
									<div class="col-lg-6">
										<?php include('profile_table.php'); ?>
									</div>
									<div class="col-lg-6">
										<?php include('profile_script.php'); ?>
									</div>
								</div>
							<?php } ?>
				<?php }else{ ?>
				<?php
					$p_row = $system->selected_profile($group_by);
					$group_by_label = $p_row['group_by_label'];
				?>
					<div class="row">
						<div class="col-lg-6">
							<?php include('profile_table.php'); ?>
						</div>
						<div class="col-lg-6">
							<?php include('profile_script.php'); ?>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>
  </section>