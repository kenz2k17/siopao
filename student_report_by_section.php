<?php include('class.php'); ?>
<?php
/* require_once('admin/tcpdf_include.php'); */
$sy = $_GET['sy'];
$grade_id = $_GET['grade_id'];
$row = $system->selected_grade($grade_id);
$grade = $row['grade'];
$section_id = $_GET['section_id'];
if($section_id == 'all'){
	$section_label = $grade.' Students List';
}else{
	$row = $system->selected_section($section_id);
	$section_label = $grade.' Section '.$row['section_name'].' List';
}
require_once('lib/tcpdf.php');


	
	

// Extend the TCPDF class to create custom Header and Footer

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		global $sy;
		global $grade_id;
		global $grade;
		global $section_label;
		// Logo
		// Set font
		$this->SetFont('courier', 'B', 14);
		/* $this->SetMargins(20,30,10,10); */
		// Title
 		$image_file = 'img/logo.png';
		$this->Image($image_file, 15, 3, 30, '', 'PNG', '', 'T', false, 200, '', false, false, 0, false, false, false); 
		// Set font
		$this->SetFont('courier', 'B', 12);
		/* $this->SetMargins(20,30,10,10); */
		// Title
		$this->Cell(120, 0, 'EB Magalona National Hight School Student List', 0, false, 'C', 0, '', 0, false); 
		$this->Ln();
		$this->Cell(0, 0, 'EB Magalona Negros Occidental', 0, false, 'C', 0, '', 0, false); 
		$this->Ln();  
		$this->Cell(0, 0, 'School Year '.$sy.'', 0, false, 'C', 0, '', 0, false); 
		$this->Ln();
		$this->Cell(0, 0, ''.$section_label.'', 0, false, 'C', 0, '', 0, false); 	

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

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
$pdf->SetFont('', '', 9);

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
		text-align:center !important;
	}
</style>
';

 
 $html .= '<table border="1" class="table1" style="padding:5px;">
			<thead>
				<tr>
					<th width="10%" class="center">ID No</th>
					<th width="25%">Full Name</th>
					<th width="30%">Address</th>
					<th width="10%">Gender</th>
					<th width="5%">Age</th>
					<th width="10%">Grade</th>
					<th width="10%">Section</th>
				</tr>
			</thead>
		<tbody>';
if($section_id == 'all'){
	$query = $system->students_list_grade($sy,$grade_id);
}else{
	$query = $system->students_list_by_section($sy,$grade_id,$section_id);
}
foreach($query as $row){
$id = $row['student_id'];
$teacher_id = $row['teacher_id'];
$t_row = $system->selected_teacher($teacher_id);

$from = new DateTime($row['birthdate']);
$to   = new DateTime('today');
$age  = $from->diff($to)->y;
	$html .= '
		<tr>
			<td width="10%" class="center">'.$row['id_number'].'</td>
			<td width="25%">'.$row['lastname'].' '.$row['middlename'].' '.$row['firstname'].'</td>
			<td width="30%" class="">'.$row['address'].'</td>
			<td width="10%" class="center">'.$row['gender'].'</td>
			<td width="5%" class="center">'.$row['age'].'</td>
			<td width="10%" class="center">'.$row['grade'].'</td>
			<td width="10%" class="center">'.$row['section_name'].'</td>
		</tr>
	';
};
$html .= '
		</tbody>
	</table>
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
