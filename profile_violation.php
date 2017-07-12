<?php 
	$sy = $_GET['sy'];
	$grade_id = $_GET['grade_id'];
?>			

			<section class="content-header">
                    <h1>
						Violation Profile  
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
		<div class="col-lg-12">
			<?php include('violation_menu.php'); ?>	
			<hr class="hr">
		</div>
		<div class="col-lg-12">
		<button onclick="window.print()" class="btn btn-info"> 
			<i class="fa fa-print"></i> Print
		</button>
		<hr class="hr">
					<div class="row">
						<div class="col-lg-6">
							<?php include('violation_profile_table.php'); ?>
						</div>
						<div class="col-lg-6">
							<?php include('violation_profile_script.php'); ?>
						</div>
					</div>

		</div>
	</div>
  </section>