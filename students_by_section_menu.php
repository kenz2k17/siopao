			<ul class="nav nav-pills">
					<?php if($section_id == 'all'){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=students_by_section&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&section_id=all">All Students</a>
					</li>
					<?php 
						foreach($system->grade_section_list($grade_id) as $row){
					?>
					<?php if($section_id == $row['section_id']){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=students_by_section&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&section_id=<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></a>
					</li>
					<?php } ?>	
					<!-- <li>
						<a href="#profile" data-toggle="modal"><i class="fa fa-file"></i> PROFILE</a>
					</li> -->
			</ul>