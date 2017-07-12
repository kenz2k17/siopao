		
  	<!-- <a href="profile_report.php?sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=<?php echo $group_by; ?>" class="btn btn-info"> 
		<i class="fa fa-print"></i> Print
	</a> -->
	<?php if($_GET['group_by'] != 'all'){ ?>
		<button onclick="window.print()" class="btn btn-info"> 
			<i class="fa fa-print"></i> Print
		</button>
	<?php } ?>
	
	<hr class="hr">	
	
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Profile data by <?php echo $group_by_label; ?></h3>
  </div>
  <div class="panel-body">

			<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="center">No</th>
							<th class="center"><?php echo $group_by_label; ?></th>
							<th class="center">Total</th>
							<th class="center">% of Total</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$no = 1;	
					if($grade_id == 'all'){
						$query = $system->profile_data($sy,$group_by);
						$profile_count = $system->profile_data_count($sy,$group_by);
						$total = $system->profile_data_total($sy,$group_by);
					}else{
						$query = $system->profile_data_by_grade($sy,$group_by,$grade_id);
						$profile_count = $system->profile_data_by_grade_count($sy,$group_by,$grade_id);
						$total = $system->profile_data_total_by_grade($sy,$group_by,$grade_id);
					}
					foreach($query as $row){
					?>	
						<tr>
							<td class="center"><?php echo $no++; ?></td>
							<?php if($group_by == 'grade_id'){ ?>
								<?php $grade_row = $system->selected_grade($row[$group_by]); ?>
								<td class="center"><?php echo $grade_row['grade']; ?></td>
							<?php }else{ ?>
								<td class="center"><?php echo $row[$group_by]; ?></td>
							<?php } ?>
							<td class="center"><?php echo $row['count_data']; ?></td>
							<td class="center"><?php echo number_format(($row['count_data'] / $total) * 100 , 2); ?></td>
						</tr>
				
	
					<?php } ?>
					
						<tr>
							<td></td>
							<td></td>
							<td class="center"><?php echo $total; ?></td>
							<td class="center">100 %</td>
						</td>
					</tbody>
				</table>
				<?php 
				$data_array = $system->data_array($query,$group_by,$profile_count);
				?>
			
  </div>
</div>	

			
