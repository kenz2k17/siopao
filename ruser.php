                <section class="content-header">
                    <h1>
						Enrolling Officer 
                    </h1>
                </section>
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
	<div class="col-lg-3">
		<?php 
			$form = 'ruser';
			include('add_forms.php');
		?>
	</div>
	<div class="col-lg-9">
			
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Enrolling Officer List</h3>
  </div>
  <div class="panel-body">
	<table class="table  table-bordered">
	<thead>
		<tr>
			<th class="col-lg-1 center">No</th>
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Status</th>
			<th class="col-lg-2">Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php 
		$no = 1;	
		foreach($system->r_user_list() as $row){
		$id = $row['user_id'];
	?>
		<tr class="del<?php echo $id ?>">
			<td class="center"><?php echo $no++; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td>
				<?php if($row['status'] == 'Active'){ ?> 
					<span class="label label-success"><?php echo $row['status']; ?></span>
				<?php }else{ ?>
					<span class="label label-danger"><?php echo $row['status']; ?></span>
				<?php } ?>
			</td>
			<td class="center">
				<a href="#edit<?php echo $id; ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a> 
				
				| <a href="#delete<?php echo $id; ?>" data-toggle="modal"><i class="fa fa-remove"></i> Delete</a> 
			</td>
		</tr>
		<?php include('delete_modal.php'); ?>
		<script>
			$(document).ready( function() {
				$('.delete_btn<?php echo $id; ?>').click( function() {
					var id = $(this).attr("id");
						$.ajax({
							type: "POST",
							url: "ajax_delete.php<?php echo '?id='.$id.'&action=delete_r_user'; ?>",
							data: ({id: id}),
							cache: false,
							success: function(html){
								$(".del"+id).fadeOut('fast'); 
								$(".main_con").html(html); 
							} 
						}); 
						return false;
				});				
			});
		</script>
	<?php } ?>	
	</tbody>
</table>
<?php 
	foreach($system->r_user_list() as $row){
	$id = $row['user_id'];
		include('edit_form_modal.php');
	}
?>		
		
  </div>
</div>

			
	</div>
	</div>
	
	</section>