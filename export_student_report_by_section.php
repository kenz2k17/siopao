<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("capstone_db",$conn);

$grade_id = $_GET['grade_id'];
$section_id = $_GET['section_id'];
$sy = $_GET['sy'];

if($section_id == 'all'){
    $SQL = "SELECT  id_number,firstname,lastname,middlename,gender,address,age,grade,section_name FROM student_table 
    LEFT JOIN grade ON grade.grade_id = student_table.grade_id
    LEFT JOIN section ON section.section_id = student_table.section_id
    WHERE school_year = '$sy' AND student_table.grade_id = '$grade_id'";
}else{
    $SQL = "SELECT  id_number,firstname,lastname,middlename,gender,address,age,grade,section_name FROM student_table 
    LEFT JOIN grade ON grade.grade_id = student_table.grade_id
    LEFT JOIN section ON section.section_id = student_table.section_id
    WHERE school_year = '$sy' AND student_table.grade_id = '$grade_id' AND student_table.section_id = '$section_id'";
}

// echo mysql_field_name($exportData);

$header = '';
$result ='';
$exportData = mysql_query ( $SQL ) or die ( "Sql error : " . mysql_error( ) );
 
/* $fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}*/
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=student_data.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$result";
 
?>