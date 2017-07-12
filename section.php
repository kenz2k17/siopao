<?php 
	$grade_id = $_GET['grade_id'];
?>         
		 <section class="content-header">
                    <h1>
						Section  
                        <small>Selection Data</small>
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
			$form = 'section';
			include('add_forms.php');
		?>
	</div>
	<div class="col-lg-9">
			
			  			<ul class="nav nav-pills">
					<?php if($grade_id == 'all'){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=section&&grade_id=all">All Section</a>
					</li>
					<?php 
						foreach($system->grade_list() as $row){
					?>
					<?php if($grade_id == $row['grade_id']){ ?>
					<li class="active">
					<?php }else{ ?>
					<li>
					<?php } ?>
						<a href="page.php?page=section&sy=<?php echo $sy; ?>&grade_id=<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></a>
					</li>
					<?php } ?>	

			</ul>
			<hr class="hr">
			
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Section Selection List</h3>
  </div>
  <div class="panel-body">

	<table class="table  table-bordered">
	<thead>
		<tr>
			<th class="col-lg-1 center">No</th>
			<th>Section</th>
			<th>Grade</th>
			<th class="col-lg-2">Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php 
		$no = 1;	
	
		if($grade_id == 'all'){
			$query = $system->section_list();
		}else{
			$query = $system->section_list_by_grade($grade_id);
		}
		
		
		
		foreach($query as $row){
		
		$id = $row['section_id'];
	?>
		<tr class="del<?php echo $id ?>">
			<td class="center"><?php echo $no++; ?></td>
			<td><?php echo $row['section_name']; ?></td>
			<td><?php echo $row['grade']; ?></td>
			<td class="center">
				<a href="#edit<?php echo $id; ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a> 
				<!-- | <a href="#delete<?php echo $id; ?>" data-toggle="modal"><i class="fa fa-remove"></i> Delete</a> -->
			</td>
		</tr>
		<?php include('delete_modal.php'); ?>
		<script>
			$(document).ready( function() {
				$('.delete_btn<?php echo $id; ?>').click( function() {
					var id = $(this).attr("id");
						$.ajax({
							type: "POST",
							url: "ajax_delete.php<?php echo '?id='.$id.'&action=delete_section'; ?>",
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
	foreach($system->section_list() as $row){
	$id = $row['section_id'];
		include('edit_form_modal.php');
	}
?>		
		
  </div>
</div>

			
	</div>
	</div>
	
	</section>