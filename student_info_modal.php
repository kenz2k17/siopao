<div class="modal fade" id="student_info<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> Student Info</h4>
      </div>
      <div class="modal-body ">
			<div class="row">
				<div class="col-lg-3 right">ID Number :</div><div class="col-lg-9"><?php echo $row['id_number']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Name : </div><div class="col-lg-9"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Gender :</div><div class="col-lg-9"><?php echo $row['gender']; ?></div>
			</div>		
			<div class="row">
				<div class="col-lg-3 right">Age :</div><div class="col-lg-9"><?php echo $age; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Address :</div><div class="col-lg-9"><?php echo $row['address']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Contact No :</div><div class="col-lg-9"><?php echo $row['contact_no']; ?></div>
			</div>	
			<div class="row">			
				<div class="col-lg-3 right">Contact Person :</div><div class="col-lg-9"><?php echo $row['contact_person']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Adviser :</div><div class="col-lg-9"><?php echo $t_row['firstname'].' '.$t_row['middlename'].' '.$t_row['lastname']; ?></div>
			</div>
			<div class="row">			
				<div class="col-lg-3 right">Grade :</div><div class="col-lg-9"><?php echo $row['grade']; ?></div>
			</div>	
			<div class="row">				
				<div class="col-lg-3 right">Section :</div><div class="col-lg-9"><?php echo $row['section_name']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">CPTLE :</div><div class="col-lg-9"><?php echo $row['tle']; ?></div>
			</div>
			<div class="row">			
				<div class="col-lg-3 right">Average :</div><div class="col-lg-9"><?php echo $row['student_ave']; ?></div>
			</div>
			
			
			
			
							<!-- <div class="row">
									<div class="col-lg-3">Violation</div>
									<div class="col-lg-3">Intervention</div>
									<div class="col-lg-3">Remarks</div>
									<div class="col-lg-3">Reported By</div>
							</div>
							<?php 
		
								$so_query = $system->student_offenses($sy,$id);
								foreach($so_query as $so_row){
								$id = $so_row['student_offenses_id'];
							?>
								<div class="row">
									<div class="col-lg-3"><?php echo $so_row['offenses']; ?></div>
									<div class="col-lg-3"><?php echo $so_row['intervention']; ?></div>
									<div class="col-lg-3"><?php echo $so_row['remarks']; ?></div>
									<div class="col-lg-3"><?php echo $so_row['reported_by']; ?></div>
								</div>
								
							<?php } ?>	 -->
						
      </div>
      <div class="modal-footer">
        <button onclick="window.open('enrol_report.php?status=old&grade='+c_grade+'&section='+c_section, '_blank');" type="button"  class="btn btn-info " ><i class="fa fa-print"></i> Print</button>
        <button type="button"  class="btn btn-default " data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
       
      </div>
    </div>
  </div>
</div>