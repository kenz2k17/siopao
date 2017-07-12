  <script>
 jQuery(document).ready(function(){
	$('#messsage').modal('hide'); 
	$('body').removeClass('modal-open');
	$('.modal-backdrop').remove();
	$('body').removeAttr('style');
});	 
</script>
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
									<table class="table table-striped table-bordered" id="dataTables-example">
										<thead>
											<tr>
												<th class="no_td">No</th>
												<th>Teacher</th>
												<th class="">Date / Time login</th>
												<th class="">Date / Time Logout</th>
											</tr>
										</thead>
										<tbody>	
										<?php 	
											$no = 1;
											foreach($system->login_trail_list() as  $row){
										?>
											<tr>
												<td><center><?php echo $no++; ?><center></td>
												<td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
												<td><?php echo $row['date_login'].' '.$row['time_login']; ?></td>
												<td><?php echo $row['date_logout'].' '.$row['time_logout']; ?></td>
											</tr>
										<?php } ?>	
										</tbody>
									</table>
		</div>
		</div>
	</section>

     