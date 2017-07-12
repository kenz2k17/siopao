                <section class="content-header">
                    <h1>
						Clubs Data
                        <small>School Year : <?php echo $sy; ?></small>
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
	<div class="col-lg-12">
			
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Clubs List</h3>
  </div>
  <div class="panel-body">
	<table class="table  table-bordered">
	<thead>
		<tr>
			<th class="col-lg-1 center">No</th>
			<th>Clubs</th>
			<th class="col-lg-2">No of Members</th>
			<th class="col-lg-2">Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php 
		$no = 1;	
		foreach($system->club_list() as $row){
		$id = $row['club_id'];
	?>
		<tr class="del<?php echo $id ?>">
			<td class="center"><?php echo $no++; ?></td>
			<td><?php echo $row['club_name']; ?></td>
			<td class="center"><?php echo $system->club_member_count($sy,$id); ?></td>
			<td class="center">
				<a href="page.php?page=club_member&id=<?php echo $id; ?>&sy=<?php echo $sy; ?>"><i class="fa fa-edit"></i> View / Add Members</a>

			</td>
		</tr>
		<?php include('delete_modal.php'); ?>
		<script>
			$(document).ready( function() {
				$('.delete_btn<?php echo $id; ?>').click( function() {
					var id = $(this).attr("id");
						$.ajax({
							type: "POST",
							url: "ajax_delete.php<?php echo '?id='.$id.'&action=delete_club'; ?>",
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
	foreach($system->club_list() as $row){
	$id = $row['club_id'];
		include('edit_form_modal.php');
	}
?>		
		
  </div>
</div>

			
	</div>
	</div>
	
	</section>