<?php 
	$page = $_GET['page'];
	
	if($page == 'students_home' || $page == 'home' || $page == 'student_list_status'){$home = 'class="selected_menu"';}else{$home = '';}
	if($page == 'login_trail'){$login_trail = 'class="selected_menu"';}else{$login_trail = '';}
	if($page == 'cptle'){$cptle = 'class="selected_menu"';}else{$cptle = '';}
	if($page == 'intervention'){$intervention = 'class="selected_menu"';}else{$intervention = '';}
	if($page == 'clubs'){$clubs = 'class="selected_menu"';}else{$clubs = '';}
	if($page == 'anecdotal'){$anecdotal = 'class="selected_menu"';}else{$anecdotal = '';}
	if($page == 'offenses'){$offenses = 'class="selected_menu"';}else{$offenses = '';}
	if($page == 'section'){$section = 'class="selected_menu"';}else{$section = '';}
	if($page == 'grade'){$grade = 'class="selected_menu"';}else{$grade = '';}
	if($page == 'sy_page'){$sy_page = 'class="selected_menu"';}else{$sy_page = '';}
	if($page == 'ruser'){$ruser = 'class="selected_menu"';}else{$ruser = '';}
	if($page == 'transaction' || $page == 'edit_transactions'){$transaction = 'class="selected_menu"';}else{$transaction = '';}
	
	if($page == 'students'){$students = 'class="selected_menu"';}else{$students = '';}
	if($page == 'teacher'){$teacher = 'class="selected_menu"';}else{$teacher = '';}
	if($page == 'archives'){$archives = 'class="selected_menu"';}else{$archives = '';}
	if($page == 'enrol'){$enrol = 'class="selected_menu"';}else{$enrol = '';}
	if($page == 'enrol_new'){$enrol_new = 'class="selected_menu"';}else{$enrol_new = '';}
	if($page == 'add_violation'){$add_violation = 'class="selected_menu"';}else{$add_violation = '';}
	if($page == 'violation_records'){$violation_records = 'class="selected_menu"';}else{$violation_records = '';}
	if($page == 'profile_violation'){$profile_violation = 'class="selected_menu"';}else{$profile_violation = '';}
	
	if($page == 'add_anecdotal'){$add_anecdotal = 'class="selected_menu"';}else{$add_anecdotal = '';}
	if($page == 'anecdotal_records'){$anecdotal_records = 'class="selected_menu"';}else{$anecdotal_records = '';}
	if($page == 'profile_anecdotal'){$profile_anecdotal = 'class="selected_menu"';}else{$profile_anecdotal = '';}
	if($page == 'add_teacher'){$add_teacher = 'class="selected_menu"';}else{$add_teacher = '';}
	if($page == 'archives_profile'){$archives_profile = 'class="selected_menu"';}else{$archives_profile = '';}
	if($page == 'transfer'){$transfer = 'class="selected_menu"';}else{$transfer = '';}
	if($page == 'edit_students'){$edit_students = 'class="selected_menu"';}else{$edit_students = '';}
	if($page == 'students_by_section'){$students_by_section = 'class="selected_menu"';}else{$students_by_section = '';}
	if($page == 'student_clubs'){$student_clubs = 'class="selected_menu"';}else{$student_clubs = '';}
	
	if($page == 'login_trail' || $page == 'cptle' || $page == 'clubs' || 
	    $page == 'intervention' || $page == 'anecdotal' || $page == 'offenses' || $page == 'section'
		|| $page == 'grade'	 || $page == 'sy_page' || $page == 'ruser'
	  ){$utilities = 'active';}else{$utilities = '';}
	 
	if($page == 'students_by_section' || $page == 'students' || $page == 'edit_students'){
		$students_records = 'active';
	}else{
		$students_records = '';
		}
		 
	  
	$row = $system->current_sy();
	$sy = $row['school_year'];
?>         
		 <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
					<div class="user-panel">
                        <div class="image">
					<h2><i class = "fa fa-user"></i> ADMIN </h2>
                        </div>
                    </div>  
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php echo $home; ?>><a href="page.php?page=home"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
						
						<?php if($user_type == 'Registrar'){ ?>
							<li <?php echo $enrol.$enrol_new.$transfer; ?>><a href="page.php?page=enrol_new&students=new"> <i class="fa fa-file"></i> <span>Enrol Student</span></a> </li>
						<?php } ?>
						<?php if($user_type == 'Guidance' || $user_type == 'Principal'){ ?>
						
							<?php  if($user_type == 'Guidance'){  ?>
								<li <?php echo $add_violation; ?>><a href="page.php?page=add_violation&sy=<?php echo $sy; ?>"> <i class="fa fa-plus"></i> <span>Add Violation for Student</span></a> </li>
							<?php } ?>
							
							<?php if($user_type == 'Principal' || $user_type == 'Guidance'){ ?>
								<li <?php echo $violation_records.$profile_violation; ?>><a href="page.php?page=violation_records&sy=<?php echo $sy; ?>&grade_id=all"> <i class="fa fa-table"></i> <span>Violation Records</span></a> </li>
							<?php } ?>
							
							<?php  if($user_type == 'Guidance'){  ?>
							<li <?php echo $add_anecdotal; ?>><a href="page.php?page=add_anecdotal&sy=<?php echo $sy; ?>"> <i class="fa fa-plus"></i> <span>Add Anecdotal for Student</span></a> </li>
							
							<?php } ?>
							
							<?php if($user_type == 'Principal' || $user_type == 'Guidance'){ ?>
								<li <?php echo $anecdotal_records.$profile_anecdotal; ?>><a href="page.php?page=anecdotal_records&sy=<?php echo $sy; ?>&grade_id=all"> <i class="fa fa-table"></i> <span>Anecdotal Records</span></a> </li>
							<?php } ?>
							
							<?php  if($user_type == 'Guidance'){  ?>
							<li <?php echo $student_clubs; ?>><a href="page.php?page=student_clubs"><i class="fa fa-angle-double-right"></i> Clubs</a></li>
							<?php } ?>
							
						<?php } ?>	
							<?php if($user_type == 'Registrar' || $user_type == 'Principal'){ ?>
							

								<li class="treeview <?php echo $students_records; ?>">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Student Records</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
									<li <?php echo $students.$edit_students; ?>><a href="page.php?page=students&sy=<?php echo $sy; ?>&grade_id=all"><i class="fa fa-user"></i> <span>By Grade</span></a></li>
									<?php $modal = 'by_grade'; include('selection_modal.php'); ?>
									<li <?php echo $students_by_section; ?>><a href="#modal<?php echo $modal; ?>" data-toggle="modal"><i class="fa fa-user"></i> <span>BY Section</span></a></li>
                            </ul>
                            </li>
							<li <?php echo $archives.$archives_profile; ?>>
                            <a href="#archives" data-toggle="modal"><i class="fa fa-folder-open"></i> <span>Previous Record per SY</span></a>
							</li>

							<li <?php echo $teacher; ?>><a href="page.php?page=teacher&sy=<?php echo $sy; ?>&grade_id=all"><i class="fa fa-users"></i> <span>Teachers Records</span></a></li>
		
							<?php } ?>
							<?php if($user_type == 'Registrar'){ ?>
								<li <?php echo $add_teacher; ?>><a href="page.php?page=add_teacher&sy=<?php echo $sy; ?>&grade_id=all"><i class="fa fa-plus"></i> <span>Add Teachers Records</span></a></li>
							<?php } ?>
						
						<?php if($user_type != 'Principal'){ ?>
                        <li class="treeview <?php echo $utilities; ?>">
                            <a href="#">
                                <i class="fa fa-gears"></i> <span>Maintenance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
								<?php if($user_type == 'Registrar'){ ?>
									<li <?php echo $sy_page; ?>><a href="page.php?page=sy_page"><i class="fa fa-angle-double-right"></i> School Year</a></li>
									<li <?php echo $grade; ?>><a href="page.php?page=grade"><i class="fa fa-angle-double-right"></i> Grade</a></li>
									<li <?php echo $section; ?>><a href="page.php?page=section&grade_id=all"><i class="fa fa-angle-double-right"></i> Section</a></li>
								<?php } ?>
								<?php if($user_type == 'Guidance'){ ?>
									<li <?php echo $offenses; ?>><a href="page.php?page=offenses"><i class="fa fa-angle-double-right"></i> Offenses Selection</a></li>
									<li <?php echo $anecdotal; ?>><a href="page.php?page=anecdotal"><i class="fa fa-angle-double-right"></i> Anecdotal Selection</a></li>
									<li <?php echo $intervention; ?>><a href="page.php?page=intervention"><i class="fa fa-angle-double-right"></i> Intervention Selection</a></li>
									<li <?php echo $clubs; ?>><a href="page.php?page=clubs"><i class="fa fa-angle-double-right"></i> Clubs Selection</a></li>
								<?php } ?>
								<?php if($user_type == 'Registrar'){ ?>
                                <li <?php echo $cptle; ?>><a href="page.php?page=cptle"><i class="fa fa-angle-double-right"></i>Program/Specialization</a></li>
                                <li <?php echo $ruser; ?>><a href="page.php?page=ruser"><i class="fa fa-angle-double-right"></i> Enrolling  Officer </a></li>
                                <?php } ?>
								<!-- <li <?php echo $login_trail; ?>><a href="page.php?page=login_trail"><i class="fa fa-angle-double-right"></i> Login Trail</a></li> -->
                            </ul>
                        </li>
						<?php } ?>
                    </ul>
                </section>
				<?php include('archives_modal.php'); ?>
            </aside>