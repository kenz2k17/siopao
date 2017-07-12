<?php 
	include('dbcon.php');
	class system{
	/*  */
	public function teacher_with_section_array($grade_id){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM teacher_table 
		LEFT JOIN section on section.section_id = teacher_table.section_id
		WHERE teacher_table.grade_id = '$grade_id' ");
		$query->execute();
		$count = $query->rowcount();
		 foreach($query->fetchAll() as $row){
			$array[] = $row['section_id'];
		 }
		 if($count == ''){
		   return 0;
		 }else{
		   return implode(',',$array);
		 }
	}
	/*  */
	public function last_student_info(){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM student_table 
		LEFT JOIN grade on grade.grade_id = student_table.grade_id
		LEFT JOIN section on section.section_id = student_table.section_id
		ORDER BY student_id DESC");
		$query->execute();
		return $query->fetch();
		
	}
	public function total_teacher_student($sy,$grade_id,$section_id,$teacher_id){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM student_table WHERE school_year = ? AND grade_id = ? AND section_id = ? AND teacher_id = ? ");
		$query->execute(array($sy,$grade_id,$section_id,$teacher_id));
		return $query->rowcount();
	}
	public function login($username,$password,$user_type){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM user_table WHERE 
		username = '$username' AND password = '$password' AND user_type = '$user_type' AND r_type = '' ");
				$query->execute();
				$count = $query->rowcount();
				$row = $query->fetch(); 
							
		if( $count > 0 ) { 
			$_SESSION['id']=$row['user_id'];
			$_SESSION['user_type']=$row['user_type'];
			if($row['user_type'] == 'Registrar'){
				echo 'true';	
			}else{
				echo 'true';
			}
		}else{ 
				echo 'false';
		}	
	}
	public function login1($username,$password,$user_type){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM user_table WHERE 
		username = '$username' AND password = '$password' AND r_type = '$user_type'");
				$query->execute();
				$count = $query->rowcount();
				$row = $query->fetch(); 
							
		if( $count > 0 ) { 
			$_SESSION['id']=$row['user_id'];
			$_SESSION['user_type']=$row['r_type'];
			if($row['r_type'] == 'enrol'){
				echo 'true1';	
			}else{
				echo 'true1';
			}
		}else{ 
				echo 'false';
		}	
	}
	
	public function current_sy(){
		global	$conn;
		$query = $conn->query("SELECT * FROM school_year_table WHERE current_year = 'Yes'");
		return $query->fetch();
	}
	public function student_full_information($id_number){
		global	$conn;
		$query = $conn->query("SELECT * FROM student_table 
		LEFT JOIN grade ON grade.grade_id = student_table.grade_id
		LEFT JOIN section ON section.section_id = student_table.section_id
		WHERE id_number  = '$id_number' ORDER BY school_year DESC ");
		return $query->fetchAll();
	}
	public function login_trail_list(){
		global	$conn;
		$query = $conn->query("SELECT * FROM login_trail 
		LEFT JOIN teacher_table on teacher_table.teacher_id = login_trail.teacher_id
		ORDER BY login_trail_id DESC");
		return $query->fetchAll();
	}
	public function login_trail($teacher_id){
		global	$conn;
		$date_login = date('F, d Y');
		$time_login = date('h:i a');
		$query = $conn->prepare("INSERT INTO login_trail (teacher_id,date_login,time_login) VALUES(?,?,?)");
		$query->execute(array($teacher_id,$date_login,$time_login));
	}
	public function last_teacher_login($teacher_id){
		global	$conn;
		$query = $conn->prepare("SELECT * FROM login_trail WHERE teacher_id = '$teacher_id' ORDER BY login_trail_id DESC");
		$query->execute();
		return $query->fetch();
	}
	public function update_login_trail($login_trail_id){
		global	$conn;
		$date_logout = date('F, d Y');
		$time_logout = date('h:i a');
		$query = $conn->prepare("UPDATE login_trail SET date_logout = ? , time_logout = ? WHERE login_trail_id = ?");
		$query->execute(array($date_logout,$time_logout,$login_trail_id));
	}

	/*  tle */
	public function tle_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM tle");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_tle($POST){
		global $conn;
		$tle = $POST['tle'];
		$query = $conn->prepare("INSERT INTO tle(tle) VALUES(?)");
		$query->execute(array($tle));
	}
	public function delete_tle($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM tle WHERE tle_id = '$id'");
		$query->execute();
	}
	public function update_tle($POST){
		global $conn;
		$tle = $POST['tle'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE tle SET tle = ? WHERE tle_id = ? ");
		$query->execute(array($tle,$id));
	}
	/*  end tle */
	
	
	/*  Club */
	public function selected_club($id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM club_table WHERE club_id = '$id'");
		$query->execute();
		return $query->fetch();	
	}
	public function club_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM club_table");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_club($POST){
		global $conn;
		$club_name = $POST['club_name'];
		$query = $conn->prepare("INSERT INTO club_table (club_name) VALUES(?)");
		$query->execute(array($club_name));
	}
	public function delete_club($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM club_table WHERE club_id = '$id'");
		$query->execute();
	}
	public function update_club($POST){
		global $conn;
		$club_name = $POST['club_name'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE club_table SET club_name = ? WHERE club_id = ? ");
		$query->execute(array($club_name,$id));
	}
	/*  end Club */
	
	
	
	/*  Grade */
	public function first_grade_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM grade ORDER BY sq_no ASC ");
		$query->execute();
		return $query->fetch();	
	}
	public function next_grade($sq_no){
		global $conn;
		$query = $conn->prepare("SELECT * FROM grade WHERE sq_no =  '$sq_no'");
		$query->execute();
		return $query->fetch();	
	}
	public function selected_grade($grade_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM grade WHERE grade_id =  '$grade_id'");
		$query->execute();
		return $query->fetch();	
	}
	public function grade_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM grade");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_grade($POST){
		global $conn;
		$grade = $POST['grade'];
		$query = $conn->prepare("INSERT INTO grade (grade) VALUES(?)");
		$query->execute(array($grade));
	}
	public function delete_grade($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM grade WHERE grade_id = '$id'");
		$query->execute();
	}
	public function update_grade($POST){
		global $conn;
		$grade = $POST['grade'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE grade SET grade = ? WHERE grade_id = ? ");
		$query->execute(array($grade,$id));
	}
	/*   end  Grade*/
	
	
		/*  Section */
	public function grade_section_list($grade_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM section WHERE grade_id = '$grade_id'");
		$query->execute();
		return $query->fetchAll();	
	}
	public function grade_section_list_teacher($grade_id,$array_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM section 
			WHERE grade_id = '$grade_id' AND section_id NOT IN ($array_id) ");
		$query->execute();
		return $query->fetchAll();	
	}
	public function section_list_by_grade($grade_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM section
		LEFT JOIN grade ON grade.grade_id = section.grade_id
		WHERE section.grade_id = '$grade_id'
		");
		$query->execute();
		return $query->fetchAll();	
	}
	public function section_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM section
		LEFT JOIN grade ON grade.grade_id = section.grade_id
		");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_section($POST){
		global $conn;
		$section_name = $POST['section_name'];
		$grade_id = $POST['grade_id'];
		$query = $conn->prepare("INSERT INTO section (section_name,grade_id) VALUES(?,?)");
		$query->execute(array($section_name,$grade_id));
	}
	public function delete_section($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM section WHERE section_id = '$id'");
		$query->execute();
	}
	public function update_section($POST){
		global $conn;
		$section_name = $POST['section_name'];
		$grade_id = $POST['grade_id'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE section SET section_name = ? , grade_id = ? WHERE section_id = ? ");
		$query->execute(array($section_name,$grade_id,$id));
	}
	/*  End Section */
	
	
	/*  Offenses */
	public function offenses_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM offenses_table");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_offenses($POST){
		global $conn;
		$offenses = $POST['offenses'];
		$query = $conn->prepare("INSERT INTO offenses_table (offenses) VALUES(?)");
		$query->execute(array($offenses));
	}
	public function delete_offenses($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM offenses_table WHERE offenses_id = '$id'");
		$query->execute();
	}
	public function update_offenses($POST){
		global $conn;
		$offenses = $POST['offenses'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE offenses_table SET offenses = ? WHERE offenses_id = ? ");
		$query->execute(array($offenses,$id));
	}
	/*  End Offenses */
	
	
		/*  Annecdotal */
	public function anecdotal_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM anecdotal");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_anecdotal($POST){
		global $conn;
		$anecdotal = $POST['anecdotal'];
		$query = $conn->prepare("INSERT INTO anecdotal (anecdotal) VALUES(?)");
		$query->execute(array($anecdotal));
	}
	public function delete_anecdotal($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM anecdotal WHERE anecdotal_id = '$id'");
		$query->execute();
	}
	public function update_anecdotal($POST){
		global $conn;
		$anecdotal = $POST['anecdotal'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE anecdotal SET anecdotal = ? WHERE anecdotal_id = ? ");
		$query->execute(array($anecdotal,$id));
	}
	/*  End Annecdotal */
	
	
	/*  Interventions */
	public function intervention_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM interventions_table");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_intervention($POST){
		global $conn;
		$intervention = $POST['intervention'];
		$query = $conn->prepare("INSERT INTO interventions_table (intervention) VALUES(?)");
		$query->execute(array($intervention));
	}
	public function delete_intervention($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM interventions_table WHERE interventions_id = '$id'");
		$query->execute();
	}
	public function update_intervention($POST){
		global $conn;
		$intervention = $POST['intervention'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE interventions_table SET intervention = ? WHERE interventions_id = ? ");
		$query->execute(array($intervention,$id));
	}
	/*  End Interventions */
	
	
		/*  Interventions */
		
	public function sy_list_archives(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM school_year_table WHERE current_year != 'Yes' ORDER BY school_year DESC");
		$query->execute();
		return $query->fetchAll();	
	}
	public function sy_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM school_year_table ORDER BY school_year DESC");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_sy($POST){
		global $conn;
		$sy = $POST['sy'];
		$query = $conn->prepare("INSERT INTO school_year_table (school_year,current_year) VALUES(?,?)");
		$query->execute(array($sy,'No'));
	}
	public function delete_sy($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM school_year_table WHERE school_year_id = '$id'");
		$query->execute();
	}
	public function update_sy($POST){
		global $conn;
		$sy = $POST['sy'];
		$current_year = $POST['current_year'];
		$id = $POST['id'];
		$query = $conn->prepare("UPDATE school_year_table SET school_year = ? , current_year = ? WHERE school_year_id = ? ");
		$query->execute(array($sy,$current_year,$id));
		
 		$query = $conn->prepare("UPDATE school_year_table SET current_year = ? WHERE school_year_id != ? ");
		$query->execute(array('No',$id)); 
	}
	/*  End Interventions */

	
	public function students_list_export($school_year_get){
		global $conn;
		$query = $conn->prepare("SELECT 
		student_table.id_number,
		student_table.firstname,
		student_table.middlename,
		student_table.lastname,
		student_table.gender,
		student_table.age,
		student_table.address
		FROM student_table
		 WHERE school_year = '$school_year_get'");
		$query->execute();
		return $query->fetch();
	}
	public function student_list($school_year_get){
		global $conn;
		$query = $conn->prepare("SELECT * FROM student_table WHERE school_year = '$school_year_get'");
		$query->execute();
		return $query->fetchAll();
	}

	public function student_list_sort($sort,$school_year_get){
		global $conn;
		$query = $conn->prepare("SELECT * FROM student_table WHERE grade_id = '$sort' AND school_year = '$school_year_get'");
		$query->execute();
		return $query->fetchAll();
	}
	public function selected_section($section_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM section   WHERE section_id = '$section_id'");
		$query->execute();
		return $query->fetch();
	}
	
	/* teacher */
		public function update_teacher($POST){
			global $conn;
			$teacher_id = $POST['teacher_id'];
			$firstname = $POST['firstname'];
			$lastname = $POST['lastname'];
			$middlename = $POST['middlename'];
			$address = $POST['address'];
			$gender = $POST['gender'];
			$grade_id = $POST['grade_id'];
			$section_id = $POST['section_id'];
			$contact_no = $POST['contact_no'];
			$emailadd = $POST['emailadd'];
			$query= $conn->prepare("UPDATE teacher_table SET emailadd = ? ,  contact_no = ? ,   firstname = ? ,  lastname = ? , middlename = ? , address = ? , gender = ? , grade_id = ? , section_id = ? WHERE teacher_id = ? ");
			$query->execute(array($emailadd,$contact_no,$firstname,$lastname,$middlename,$address,$gender,$grade_id,$section_id,$teacher_id));
		}
		public function add_teacher($POST){
			global $conn;
			$firstname = $POST['firstname'];
			$lastname = $POST['lastname'];
			$middlename = $POST['middlename'];
			$address = $POST['address'];
			$gender = $POST['gender'];
			$grade_id = $POST['grade_id'];
			$section_id = $POST['section_id'];
			$contact_no = $POST['contact_no'];
			$emailadd = $POST['emailadd'];
			
			$rd2 = mt_rand(1000, 9999);
			$filename = basename($_FILES['file']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			$file = $rd2. "_" .$filename;
			(move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$file));
			
			$query= $conn->prepare("INSERT INTO teacher_table (emailadd,contact_no,firstname,lastname,middlename,address,gender,grade_id,section_id,photo) VALUES(?,?,?,?,?,?,?,?,?,?)");
			$query->execute(array($emailadd,$contact_no,$firstname,$lastname,$middlename,$address,$gender,$grade_id,$section_id,$file));
		}
		public function change_teacher_picture($POST){
			global $conn;
			$id = $POST['id'];

			 $row = $this->selected_teacher($id);
			unlink('uploads/'.$row['photo']); 
			
			$rd2 = mt_rand(1000, 9999);
			$filename = basename($_FILES['file']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			$file = $rd2. "_" .$filename;
			(move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$file));
			
			$query= $conn->prepare("UPDATE teacher_table SET photo = ? WHERE teacher_id = ?");
			$query->execute(array($file,$id));
		}
		
		public function filder_teacher_list($grade_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM teacher_table
			LEFT JOIN grade ON grade.grade_id = teacher_table.grade_id
			LEFT JOIN section ON section.section_id = teacher_table.section_id
			WHERE teacher_table.grade_id = '$grade_id'	
			");
			$query->execute();
			return $query->fetchAll();
		}
		
		public function teacher_list_by_grade($grade_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM teacher_table
			LEFT JOIN grade ON grade.grade_id = teacher_table.grade_id
			LEFT JOIN section ON section.section_id = teacher_table.section_id
			WHERE teacher_table.grade_id = '$grade_id'");
			$query->execute();
			return $query->fetchAll();
		}
		public function teacher_list(){
			global $conn;
			$query = $conn->prepare("SELECT * FROM teacher_table
			LEFT JOIN grade ON grade.grade_id = teacher_table.grade_id
			LEFT JOIN section ON section.section_id = teacher_table.section_id
			");
			$query->execute();
			return $query->fetchAll();
		}
		
		public function selected_teacher($teacher_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM teacher_table
			LEFT JOIN grade ON grade.grade_id = teacher_table.grade_id
			LEFT JOIN section ON section.section_id = teacher_table.section_id
			WHERE teacher_id = '$teacher_id'");
			$query->execute();
			return $query->fetch();
		}
	/* end teacher */
	
	/* students data */
		public function sy_no_students($school_year){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year'");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_students_new($school_year){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND status = 'new' ");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_students_existing($school_year){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND status = 'existing' ");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_students_transfer($school_year){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND status = 'transfer' ");
			$query->execute();
			return $query->rowcount();
		}
		
		public function sy_no_students_by_grade($school_year,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND grade_id = '$grade_id'");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_new_students_by_grade($school_year,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND grade_id = '$grade_id' AND status = 'New' ");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_transferee_students_by_grade($school_year,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND grade_id = '$grade_id' AND status = 'transfer' ");
			$query->execute();
			return $query->rowcount();
		}
		public function sy_no_old_students_by_grade($school_year,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT student_id FROM student_table WHERE school_year = '$school_year' AND grade_id = '$grade_id' AND status = 'existing' ");
			$query->execute();
			return $query->rowcount();
		}
		public function students_list_with_status($sy,$status){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' AND status = '$status' ORDER BY lastname ASC");
			$query->execute();
			return $query->fetchAll();
		}
		public function selected_student_id_number_sy($id_number,$sy){
			global $conn;
			$query = $conn->prepare("SELECT *  FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE id_number = '$id_number' AND school_year = '$sy' ORDER BY student_id DESC");
			$query->execute();
			return $query->fetch();
		}
		public function selected_student_id_number($id_number){
			global $conn;
			$query = $conn->prepare("SELECT *  FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id

			WHERE id_number = '$id_number' ORDER BY student_id DESC");
			$query->execute();
			return $query->fetch();
		}
		public function selected_student($student_id){
			global $conn;
			$query = $conn->prepare("SELECT *  FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id

			WHERE student_id = '$student_id' ORDER BY student_id ASC");
			$query->execute();
			return $query->fetch();
		}
		public function students_list_array($sy){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' GROUP BY id_number");
			$query->execute();
			$count = $query->rowcount();
			foreach($query->fetchAll() as $row){
				$array[] = $row['id_number'];
			}
				if($count == ''){
					return 0;
				}else{
					return implode(',',$array);
				}
			}
		public function students_list_selection($array){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE id_number NOT IN ($array) GROUP BY id_number");
			$query->execute();
			return $query->fetchAll();
		}
		public function students_list($sy){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' ORDER BY id_number ASC");
			$query->execute();
			return $query->fetchAll();
		}
		public function students_list_grade($sy,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' AND student_table.grade_id = '$grade_id' ORDER BY id_number ASC");
			$query->execute();
			return $query->fetchAll();
		}
		
		
		public function students_list_by_section($sy,$grade_id,$section_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' AND student_table.grade_id = '$grade_id' AND section.section_id = '$section_id' ");
			$query->execute();
			return $query->fetchAll();
		}
		public function students_list_by_grade($sy,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT * FROM student_table
			LEFT JOIN grade on grade.grade_id = student_table.grade_id
			LEFT JOIN section on section.section_id = student_table.section_id
			WHERE school_year = '$sy' AND student_table.grade_id = '$grade_id'");
			$query->execute();
			return $query->fetchAll();
		}

		public function profile_data_by_grade($sy,$group_by,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' AND grade_id = '$grade_id' GROUP BY $group_by ");
			$query->execute();
			return $query->fetchAll();
		}
		public function profile_data_by_grade_count($sy,$group_by,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' AND grade_id = '$grade_id' GROUP BY $group_by ");
			$query->execute();
			return $query->rowcount();
		}
		public function profile_data($sy,$group_by){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' GROUP BY $group_by ");
			$query->execute();
			return $query->fetchAll();
		}
		public function profile_data_count($sy,$group_by){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' GROUP BY $group_by ");
			$query->execute();
			return $query->rowcount();
		}
		public function profile_data_total($sy,$group_by){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' ");
			$query->execute();
			$row =  $query->fetch();
			return $row['count_data'];
		}
		public function profile_data_total_by_grade($sy,$group_by,$grade_id){
			global $conn;
			$query = $conn->prepare("SELECT *,COUNT($group_by) as count_data FROM student_table WHERE school_year = '$sy' AND grade_id = '$grade_id' ");
			$query->execute();
			$row =  $query->fetch();
			return $row['count_data'];
		}
		public function profile_list(){
			global $conn;
			$query = $conn->prepare("SELECT * FROM profile");
			$query->execute();
			return $query->fetchAll();
		}
		public function selected_profile($group_by){
			global $conn;
			$query = $conn->prepare("SELECT * FROM profile WHERE group_by = '$group_by'");
			$query->execute();
			return $query->fetch();
		}
		public function data_array($query,$group_by,$profile_count){
			foreach($query as $row){
				if($group_by == 'grade_id'){
					$grade_row = $this->selected_grade($row[$group_by]); 
					$array[] = '{"group_by":'.'"'.$grade_row['grade'].'"'.','.'"data_count":'.$row['count_data'].',}';		
				}else{
					$array[] = '{"group_by":'.'"'.$row[$group_by].'"'.','.'"data_count":'.$row['count_data'].',}';					
				}
			}
			if($profile_count == ''){
				return 0;
			}else{
				return implode(',',$array);
			}
		}
		public function id_number(){
			global $conn;
			$query = $conn->query("SELECT * FROM student_table ORDER BY id_number DESC");
			$row = $query->fetch();
			$count = $query->rowcount();
 			if($count > 0){
				return $row['id_number'] + 1;
			}else{
				return 21700;
			}
		}
		public function enrol_student(){
			global $conn;
			$id_number = $_POST['id_number'];
			$sy = $_POST['sy'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$middlename = $_POST['middlename'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$contact_no = $_POST['contact_no'];
			$contact_person = $_POST['contact_person'];
			$section_id = $_POST['section_id'];
			$teacher_id = $_POST['teacher_id'];
			$grade_id = $_POST['grade_id'];
			$tle = $_POST['tle'];
			$student_ave = $_POST['student_ave'];
			$status = $_POST['status'];
			$elementary = $_POST['elementary'];
			$birthdate = $_POST['birthdate'];
			$student_status = $_POST['student_status'];
			$birthdate = date("Y-m-d", strtotime($birthdate));
			$date_enrol = date("Y-m-d");
			
			$c= date('Y');
			$y= date('Y',strtotime($birthdate));
			$age =  $c-$y;
			
			$tc = $this->tc(7);
			
			$query = $conn->prepare("INSERT INTO student_table (tc,date_enrol,student_status,elementary,age,birthdate,grade_id,id_number,school_year,firstname,lastname,middlename,gender,address,contact_no,contact_person,section_id,teacher_id,tle,student_ave,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$query->execute(array($tc,$date_enrol,$student_status,$elementary,$age,$birthdate,$grade_id,$id_number,$sy,$firstname,$lastname,$middlename,$gender,$address,$contact_no,$contact_person,$section_id,$teacher_id,$tle,$student_ave,$status));
		}
		
		public function tc($length)
		{
			$chars ="1234567890abcdefghijklmnopqrstuvwxyz";//length:36
			$final_rand='';
			for($i=0;$i<$length; $i++)
			{
				$final_rand .= $chars[ rand(0,strlen($chars)-1)];
			}
			return $final_rand;
		}
		public function update_student(){
			global $conn;
			$id = $_POST['id'];
			$id_number = $_POST['id_number'];
			$sy = $_POST['sy'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$middlename = $_POST['middlename'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$contact_no = $_POST['contact_no'];
			$contact_person = $_POST['contact_person'];
			$section_id = $_POST['section_id'];
			$teacher_id = $_POST['teacher_id'];
			$grade_id = $_POST['grade_id'];
			$tle = $_POST['tle'];
			$student_ave = $_POST['student_ave'];
			$status = $_POST['status'];
			$student_status = $_POST['student_status'];
			
			$birthdate = $_POST['birthdate'];
			$birthdate = date("Y-m-d", strtotime($birthdate));
			
			$c= date('Y');
			$y= date('Y',strtotime($birthdate));
			$age =  $c-$y;
			
			$query = $conn->prepare("UPDATE student_table SET student_status = ? , age = ? ,  birthdate = ? ,  firstname = ? , lastname = ? , middlename = ? , 
			gender = ? , address = ? , contact_no = ? , contact_person = ? , section_id = ? , teacher_id = ? , grade_id = ? , 
			tle = ? , student_ave = ?  WHERE student_id = ? 
			");
			$query->execute(array($student_status,$age,$birthdate,$firstname,$lastname,$middlename,$gender,$address,$contact_no,$contact_person,$section_id,$teacher_id,$grade_id,$tle,$student_ave,$id));
			

		}
		
		
	/* end students data */
	/*  student offense */
	public function student_offenses($sy,$student_id){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_offenses_table 
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN interventions_table ON interventions_table.interventions_id = student_offenses_table.interventions_id
			WHERE student_table.school_year = '$sy' AND student_table.student_id = '$student_id'
			");
		return	$query->fetchAll();
	}
	public function student_offenses_table($sy){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_offenses_table 
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN interventions_table ON interventions_table.interventions_id = student_offenses_table.interventions_id
			WHERE student_table.school_year = '$sy'
			");
		return	$query->fetchAll();
	}
	public function selected_student_offenses($id){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_offenses_table 
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN interventions_table ON interventions_table.interventions_id = student_offenses_table.interventions_id
			WHERE student_offenses_id = '$id'
			");
		return	$query->fetch();
	}
	
	
	public function student_offenses_table_by_grade($sy,$grade_id){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_offenses_table 
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN interventions_table ON interventions_table.interventions_id = student_offenses_table.interventions_id
			WHERE student_table.school_year = '$sy' AND student_table.grade_id = '$grade_id'
			");
		return	$query->fetchAll();
	}
	/* profile violation   */
	
		public function profile_data_violation($sy){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_offenses_table.offenses_id) AS count_data FROM student_offenses_table 
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			WHERE student_table.school_year = '$sy' GROUP BY  student_offenses_table.offenses_id ");
			return	$query->fetchAll();
		}
		public function profile_data_total_violation($sy){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_offenses_table.offenses_id) AS count_data  FROM student_offenses_table 
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			WHERE student_table.school_year = '$sy' ");
			$row = $query->fetch();
			return $row['count_data'];
		}
		
		public function profile_data_violation_by_grade($sy,$grade_id){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_offenses_table.offenses_id) AS count_data FROM student_offenses_table 
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			WHERE student_table.school_year = '$sy' AND grade_id = '$grade_id' GROUP BY  student_offenses_table.offenses_id ");
			return	$query->fetchAll();
		}
		public function profile_data_total_violation_by_grade($sy,$grade_id){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_offenses_table.offenses_id) AS count_data  FROM student_offenses_table 
			LEFT JOIN offenses_table ON offenses_table.offenses_id = student_offenses_table.offenses_id
			LEFT JOIN student_table ON student_table.student_id = student_offenses_table.student_id
			WHERE student_table.school_year = '$sy' AND grade_id = '$grade_id' ");
			$row = $query->fetch();
			return $row['count_data'];
		}
		public function violation_data_array($query){
		
			foreach($query as $row){
				
				$array[] = '{"group_by":'.'"'.$row['offenses'].'"'.','.'"data_count":'.$row['count_data'].',}';					
		
			}
			return implode(',',$array);
		}
	/*  end profile violation */
	public function update_student_violation($POST){
		global $conn;
		$id = $POST['id'];
		$student_id = $POST['student_id'];
		$interventions_id = $POST['interventions_id'];	
		$offenses_id = $POST['offenses_id'];	
		$remarks = $POST['remarks'];
		$reported_by = $POST['reported_by'];
		
		
		$query = $conn->prepare("UPDATE student_offenses_table SET student_id = ? , interventions_id = ? , offenses_id = ? , remarks = ? , reported_by = ? WHERE student_offenses_id = ? ");	
		$query->execute(array($student_id,$interventions_id,$offenses_id,$remarks,$reported_by,$id));

	}
	public function add_student_violation($POST){
		global $conn;
		$student_id = $POST['student_id'];
		$interventions_id = $POST['interventions_id'];	
		$offenses_id = $POST['offenses_id'];	
		$remarks = $POST['remarks'];
		$reported_by = $POST['reported_by'];
		
		foreach($student_id as $student_id){
			$query = $conn->prepare("INSERT INTO student_offenses_table(student_id,interventions_id,offenses_id,remarks,reported_by) VALUES(?,?,?,?,?)");	
			$query->execute(array($student_id,$interventions_id,$offenses_id,$remarks,$reported_by));
		}
	}
	public function delete_student_violation($id){
		global $conn;
		$query = $conn->query("DELETE FROM student_offenses_table WHERE student_offenses_id = '$id'");
	}
	/* end offense  */
	
	/*  student anecdotal */
		public function selected_student_anecdotal($id){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_anecdotal_table 
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			WHERE student_anecdotal_id = '$id'
			");
		return	$query->fetch();
	}
	public function student_anecdotal_list($sy){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_anecdotal_table 
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			WHERE student_table.school_year = '$sy'
			");
		return	$query->fetchAll();
	}
	public function student_anecdotal_list_by_grade($sy,$grade_id){
		global $conn;
			$query = $conn->query("SELECT *  FROM student_anecdotal_table 
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			WHERE student_table.school_year = '$sy' AND student_table.grade_id = '$grade_id'
			");
		return	$query->fetchAll();
	}
	
	public function update_student_anecdotal($POST){
		global $conn;
		$id = $POST['id'];
		$student_id = $POST['student_id'];
		$anecdotal_id = $POST['anecdotal_id'];		
		$remarks = $POST['remarks'];
		

		$query = $conn->prepare("UPDATE student_anecdotal_table SET student_id = ? , anecdotal_id = ? , remarks = ? WHERE student_anecdotal_id = ?");	
		$query->execute(array($student_id,$anecdotal_id,$remarks,$id));
	
	}
	public function add_student_anecdotal($POST){
		global $conn;
		$student_id = $POST['student_id'];
		$anecdotal_id = $POST['anecdotal_id'];		
		$remarks = $POST['remarks'];
		
		foreach($student_id as $student_id){
			$query = $conn->prepare("INSERT INTO student_anecdotal_table(student_id,anecdotal_id,remarks) VALUES(?,?,?)");	
			$query->execute(array($student_id,$anecdotal_id,$remarks));
		}
	}
	public function delete_student_anecdotal($id){
		global $conn;
		$query = $conn->query("DELETE FROM student_anecdotal_table WHERE student_anecdotal_id = '$id'");
	}
	
	/* end anecdotal  */
	

	
		/* profile violation   */
	
		public function profile_data_anecdotal($sy){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_anecdotal_table.anecdotal_id) AS count_data FROM student_anecdotal_table 
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			WHERE student_table.school_year = '$sy' GROUP BY  student_anecdotal_table.anecdotal_id ");
			return	$query->fetchAll();
		}
		public function profile_data_total_anecdotal($sy){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_anecdotal_table.anecdotal_id) AS count_data FROM student_anecdotal_table 
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			WHERE student_table.school_year = '$sy' ");
			$row = $query->fetch();
			return $row['count_data'];
		}
		
		public function profile_data_anecdotal_by_grade($sy,$grade_id){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_anecdotal_table.anecdotal_id) AS count_data FROM student_anecdotal_table 
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			WHERE student_table.school_year = '$sy' AND grade_id = '$grade_id' GROUP BY  student_anecdotal_table.anecdotal_id ");
			return	$query->fetchAll();
		}
		public function profile_data_total_anecdotal_by_grade($sy,$grade_id){
			global $conn;
			$query = $conn->query("SELECT *,COUNT(student_anecdotal_table.anecdotal_id) AS count_data FROM student_anecdotal_table 
			LEFT JOIN anecdotal ON anecdotal.anecdotal_id = student_anecdotal_table.anecdotal_id
			LEFT JOIN student_table ON student_table.student_id = student_anecdotal_table.student_id
			WHERE student_table.school_year = '$sy' AND grade_id = '$grade_id' ");
			$row = $query->fetch();
			return $row['count_data'];
		}
		public function anecdotal_data_array($query){
		
			foreach($query as $row){
				
				$array[] = '{"group_by":'.'"'.$row['anecdotal'].'"'.','.'"data_count":'.$row['count_data'].',}';					
		
			}
			return implode(',',$array);
		}
	/*  end profile anecodotal */
	
	
		/*  Club  member*/
	public function club_member_count($sy,$club_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM club_member
		LEFT JOIN student_table ON club_member.student_id = student_table.student_id
		LEFT JOIN grade ON student_table.grade_id = grade.grade_id
		WHERE club_member.school_year = '$sy' AND club_id = '$club_id'");
		$query->execute();
		return $query->rowcount();	
	}
	public function club_member_list($sy,$club_id){
		global $conn;
		$query = $conn->prepare("SELECT * FROM club_member
		LEFT JOIN student_table ON club_member.student_id = student_table.student_id
		LEFT JOIN grade ON student_table.grade_id = grade.grade_id
		WHERE club_member.school_year = '$sy' AND club_id = '$club_id'");
		$query->execute();
		return $query->fetchAll();	
	}
	public function add_club_member($POST){
		global $conn;
		$student_id = $POST['student_id'];
		$sy = $POST['sy'];
		$club_id = $POST['club_id'];
		$query = $conn->prepare("INSERT INTO club_member (student_id,school_year,club_id) VALUES(?,?,?)");
		$query->execute(array($student_id,$sy,$club_id));
	}
	public function delete_club_member($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM club_member WHERE club_member_id = '$id'");
		$query->execute();
	}
	public function update_club_member($POST){
		global $conn;
		$id = $POST['id'];
		$student_id = $POST['student_id'];
		$query = $conn->prepare("UPDATE club_table SET student_id = ?  WHERE club_member_id = ? ");
		$query->execute(array($student_id,$id));
	}
	/*  end Club */
	/* user  */
	public function r_user_list(){
		global $conn;
		$query = $conn->prepare("SELECT * FROM user_table WHERE user_type  = 'Registrar' AND r_type = 'enrol' ");
		$query->execute();
		return $query->fetchAll();	
	}
	public function save_r_user($POST){
		global $conn;
		$name = $POST['name'];
		$username = $POST['username'];
		$password = $POST['password'];
		$query = $conn->prepare("INSERT INTO user_table(name,username,password,user_type,r_type,status) VALUES(?,?,?,?,?,?)");
		$query->execute(array($name,$username,$password,'Registrar','enrol','Active'));
	}
	public function delete_r_user($id){
		global $conn;
		$query = $conn->prepare("DELETE FROM user_table WHERE user_id = '$id'");
		$query->execute();
	}
	public function update_r_user($POST){
		global $conn;
			$id = $POST['id'];
			$name = $POST['name'];
			$username = $POST['username'];
			$password = $POST['password'];
			$status = $POST['status'];
		$query = $conn->prepare("UPDATE user_table SET name = ? , username = ? , password = ? , status = ? WHERE user_id = ? ");
		$query->execute(array($name,$username,$password,$status,$id));
	}
	public function update_user($POST){
		global $conn;
			$id = $POST['id'];
			$name = $POST['name'];
			$username = $POST['username'];
			$password = $POST['password'];
			$c_password = $POST['c_password'];
			
			$query = $conn->query("SELECT * from user_table where user_id = '$id'");
			$row = $query->fetch();
			
			if($row['password'] == $c_password){
				$query = $conn->prepare("UPDATE user_table SET name = ? , username = ? , password = ?  WHERE user_id = ? ");
				$query->execute(array($name,$username,$password,$id));
				return 1;
			}else{
				return 0;	
			}
		
	}
	/* end user  */
	}
$system = new system();
?>