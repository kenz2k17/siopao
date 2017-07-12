			<ul class="nav nav-tabs">
					<?php if($grade_id == 'all'){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=violation_records&sy=<?php echo $sy; ?>&grade_id=all">Al Students</a>
					</li>
					<?php 
						foreach($system->grade_list() as $row){
					?>
					<?php if($grade_id == $row['grade_id']){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=violation_records&sy=<?php echo $sy; ?>&grade_id=<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></a>
					</li>
					<?php } ?>	
					<li>
						<a href="page.php?page=profile_violation&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>"><i class="fa fa-bar-chart"></i> Profile Violations</a>
					</li>
			</ul>