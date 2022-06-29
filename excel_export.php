<?php  
  
$con=pg_connect("host=localhost port=5432 dbname=innovation_center user=openpg password=admin");
	if(!$con){
		die('Connection error:'.pg_last_error());
	}
	else
	{
		
		$i=0;
		$student_query="SELECT student_id,sname,course,branch,course_year,semester,email,mobile,others_info,id from student_info";
		$rs=pg_query($con,$student_query) or die("Cannot execute query: Student\n");
		
		$headdings='';
		$headdings="\t"."Personal Information" . "\t" . " Education Qualification" . "\t". "Awareness of Programming Languages". "\t". "External Certificates". "\t". "Other Information". "\t";
		$headdings.="Innovative Solutions Implemented"."\t". "New Ideas". "\t"; 
		$columnHeader = '';  
		$columnHeader = "Sr NO" . "\t" . "Hallticket Number" . "\t" . "Name" . "\t" . "Course" . "\t" . "Branch" . "\t" . "Year" . "\t" . "Semester" . "\t" . "Email" . "\t" . "Mobile Number" . "\t" . "Other Information" . "\t";  
		$columnHeader .="Qualification" . "\t" . "Year" . "\t" . "Percentage" . "\t" ;
		
		$setData = '';  
  while($row=pg_fetch_row($rs)){$i++;
	$rowData='';    
		$value='"'.$i.'"'."\t";
		 $rowData .= $value;
		 for($j=0;$j<9;$j++){
		 $value=$row[$j];
		 $value = '"' . $value . '"' . "\t";  
        $rowData .= $value; 
		 
		 }
  /*  foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  */
     
	
	$academic_query="SELECT qualification,course_year,percentage from academic_details where student_id=$row[9]";
			$rs1=pg_query($con,$academic_query) or die("Cannot execute query: Academics \n");
			while($academic=pg_fetch_row($rs1)){
				
		 foreach ($academic as $value1){
			 
		 $value1 = '"' . $value1 . '"' . "\t";  
        $rowData .= $value1; 
		 
		 }
			}
		  $setData .= trim($rowData) . "\n";
}  
  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Student_Nominations_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords ($headdings) . "\n" .($columnHeader) . "\n" . $setData . "\n";  
	
	}
		?>  