			<ul class="nav nav-pills">
					<?php if($grade_id == 'all'){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=teacher&sy=<?php echo $sy; ?>&grade_id=all">All Teachers</a>
					</li>
					<?php 
						foreach($system->grade_list() as $row){
					?>
					<?php if($grade_id == $row['grade_id']){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=teacher&sy=<?php echo $sy; ?>&grade_id=<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></a>
					</li>
					<?php } ?>	
			</ul>