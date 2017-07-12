<script>
		jQuery(document).ready(function(){
			jQuery("#form_update<?php echo $id; ?>").submit(function(e){
				e.preventDefault();
				var formData = jQuery(this).serialize();
				$.ajax({
					type: "POST",
					<?php if($form == 'section'){ ?>
						url: "ajax_update.php?grade_id=<?php echo $grade_id; ?>",
					<?php }else{ ?>
						url: "ajax_update.php",
					<?php } ?>	
					data: formData,
					success: function(html){
							$('.main_con').html(html);
					}
				});
					return false;
		});
							
		});
	</script>