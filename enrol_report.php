<?php include('class.php'); ?>
<?php
/* require_once('admin/tcpdf_include.php'); */
require_once('lib/tcpdf.php');

$row = $system->last_student_info();
$sy = $row['school_year'];
$teacher_id = $row['teacher_id'];
$grade_id = $row['grade_id'];
$section_id = $row['section_id'];
$t_row = $system->selected_teacher($teacher_id);

$status = $_GET['status'];
if($status == 'old'){
	$grade = $_GET['grade'];
	$section = $_GET['section'];
}else if($status == 'new'){
	$grade = '';
	$section = '';	
}else if($status == 'transfer'){
	$grade = '';
	$section = '';
}
$tc = $row['tc'];
// Extend the TCPDF class to create custom Header and Footer

class MYPDF extends TCPDF {

	//Page header
/* 	public function Header() {
		$this->SetFont('courier', 'B', 14);
		$this->Cell(190, 10, 'EB Magalona National Hight School Student List', 0, false, 'C', 0, '', 0, false); 
	}  */
	public function Header() {	
		global $sy;
		global $tc;
		// Logo
 		$image_file = 'img/logo.png';
		$this->Image($image_file, 5, 10, 30, '', 'PNG', '', 'T', false, 200, '', false, false, 0, false, false, false); 
		// Set font
		$this->SetFont('courier', 'B', 12);
		/* $this->SetMargins(20,30,10,10); */
		// Title
		$this->Cell(80, 0, 'EB Magalona National High School', 0, false, 'C', 0, '', 0, false); 
		$this->Ln();
		$this->Cell(0, 0, 'EB Magalona Negros Occidental', 0, false, 'C', 0, '', 0, false); 
		$this->Ln();  
		$this->Cell(0, 0, 'School Year '.$sy.'', 0, false, 'C', 0, '', 0, false); 
      
	}

	// Page footer
	public function Footer() {
	 	// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('courier', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M'); 
	}
}


/* 421 */
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(175,150), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

/* $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(400, 300), true, 'UTF-8', false); */

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 35, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetFont('courier');
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
/* $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); */

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
$date = date('F ,d Y');
// define some HTML content with style
$html = '
<style>
	.center{
		text-align:center;
	}
	.right{
		text-align:right;
	}
	.table{
		margin-left:40px !important;
	}
	.td1{
		width:20% !important;
	}
	.td2{
		width:30% !important;
	}
	.td3{
		width:50% !important;
	}
	.td4{
		width:60% !important;
	}
	.td5{
		width:70% !important;
	}
	.td5-5{
		width:75% !important;
	}
	.td6{
		width:80% !important;
	}
	.td7{
		width:90% !important;
	}
	.td2-1{
		width:33% !important;
	}
</style>

<h1 class="center"><b>Enrolment Slip</b></h1>
<br>
<br>
<b><h2 style="text-transform:uppercase;text-align:center">'.$tc.'</h2></b>
<br>
<br>
<table  class="table" border="">
	<tr>
		<td class="td2-1 center"><b>'.$row['lastname'].'</b></td>
		<td class="td2-1 center"><b>'.$row['firstname'].'</b></td>
		<td class="td2-1 center"><b>'.$row['middlename'].'</b></td>
	</tr>
	<tr>
		<td class="td2-1 center">(Surname)</td>
		<td class="td2-1 center">(Firstname)</td>
		<td class="td2-1 center">(Middle Name)</td>
	</tr>
</table>
<br>
<br>
<table  class="table" border="">
	<tr><td class="td3 right">Previous Year Level And Section:</td><td class="">'.$grade.' '.$section.'</td></tr>
	<tr><td class="td3 right">Gen Ave:</td><td class="">'.$row['student_ave'].'</td></tr>
	<tr><td class="td3 right">Enrolled Year Level And Section:</td><td class="">'.$row['grade'].' '.$row['section_name'].'</td></tr>
	<tr><td class="td3 right">Adviser:</td><td class="">'.$t_row['firstname'].' '.$t_row['middlename'].' '.$t_row['lastname'].'</td></tr>
	<tr><td class="td3 right">CPTLE:</td><td class="">'.$row['tle'].'</td></tr>
	<tr><td class="td3 right">Contact No:</td><td class="">'.$row['contact_no'].'</td></tr>
	<tr><td class="td3 right">Contact Person:</td><td class="">'.$row['contact_person'].'</td></tr>
	<tr><td class="td3 right">Gender:</td><td class="">'.$row['gender'].'</td></tr>
	<tr><td class="td3 right">Birthdate:</td><td class="">'.date('F, d Y',strtotime($row['birthdate'])).'</td></tr>
	<tr><td class="td3 right">Address:</td><td class="">'.$row['address'].'</td></tr>
	<tr><td class="td3 right">Date Enrol:</td><td class="">'.date('F,d Y').'</td></tr>
</table>
<br>
<br>
';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
/* $pdf->writeHTML(include('test.php'), true, false, true, false, ''); */

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('student_list'.$sy.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
