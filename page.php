<?php include('header.php'); ?>
<?php include('session.php'); ?>
	<?php if($user_type == 'Registrar'){ ?>
		<body class="skin-blue" id="red">
	<?php } ?>
	<?php if($user_type == 'Guidance'){ ?>
		<body class="skin-blue" id="green">
	<?php } ?>
	<?php if($user_type == 'Principal'){ ?>
		<body class="skin-blue">
	<?php } ?>
	
		<?php include('navbar.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
		
			
			<?php if($user_type == 'enrol'){ ?>
				<?php include('sidebar1.php') ?>
			<?php }else{ ?>
				<?php include('sidebar.php') ?>
			<?php } ?>
			
            <aside class="right-side main_con">
				<?php include($page.'.php'); ?>
            </aside>
        </div>
		<?php include('script.php'); ?>	
    </body>
</html>