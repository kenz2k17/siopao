			
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Profile data by Violations</h3>
  </div>
  <div class="panel-body">
			<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="center">No</th>
							<th class="center">Violations</th>
							<th class="center">Total</th>
							<th class="center">% of Total</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$no = 1;	
					
					if($grade_id == 'all'){
						$query = $system->profile_data_anecdotal($sy);
						$total = $system->profile_data_total_anecdotal($sy);
					}else{
						$query = $system->profile_data_anecdotal_by_grade($sy,$grade_id);
						$total = $system->profile_data_total_anecdotal_by_grade($sy,$grade_id);
					}
					foreach($query as $row){
					?>	
						<tr>
							<td class="center"><?php echo $no++; ?></td>
							<td class="center"><?php echo $row['anecdotal']; ?></td>
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
				$data_array = $system->anecdotal_data_array($query);
				?>
			
  </div>
</div>	

			
