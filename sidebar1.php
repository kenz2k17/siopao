<?php 
	$page = $_GET['page'];

	if($page == 'enrol'){$enrol = 'class="selected_menu"';}else{$enrol = '';}
	if($page == 'enrol_new'){$enrol_new = 'class="selected_menu"';}else{$enrol_new = '';}
	if($page == 'transfer'){$transfer = 'class="selected_menu"';}else{$transfer = '';}
	
	$row = $system->current_sy();
	$sy = $row['school_year'];
?>         
		 <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
					<div class="user-panel">
                        <div class="image center">
                           <h4 class = "">WELCOME</h4>
						   <br/>
						   
                           <span class = ""><?php echo $user_name;?></span>
                        </div>
                    </div>  
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
							<li style="background-color:#3d9970 !important" <?php echo $enrol.$enrol_new.$transfer; ?>><a href="page.php?page=enrol_new&students=new"> <i class="fa fa-file"></i> <span>Enrol Student</span> <i class = "pull-right fa fa-angle-right"></i></a> </li>
                    </ul>
                </section>
            </aside>