<script>
			jQuery(document).ready(function(){
				jQuery("#form_update<?php echo $id; ?>").submit(function(e){
				e.preventDefault();
				var _this = $(e.target);
				var formData = new FormData($(this)[0]);
				$.ajax({
					type: "POST",
					url: "ajax_update.php",
					data: formData,
					success: function(html){ 
						$('.main_con').html(html);   			 				
					},
						cache: false,
						contentType: false,
						processData: false
				});
					return false;
		});
		});
	</script>	