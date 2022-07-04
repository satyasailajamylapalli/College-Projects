<?php

echo 'report page';
?>


<html>  
  
<head>  
    <title>User Detail Report</title>  
</head>  
  
<body>  
    <table border="1">  
        <tr>  
            <th>Sr NO.</th>  
			<th width="120">Hall-Ticket Number</th> 
            <th width="120">Student Name</th>  
			<th width="120">Course</th>
			<th width="120">Branch</th> 
			<th width="120">Year</th> 
			<th width="120">Semester</th> 
			<th width="120">Email-Id</th> 
			<th width="120">Mobile Number</th> 
			<th width="120">Other Information</th> 
			<th width="120">Qualification</th>
			<th width="120">Year</th>
			<th width="120">Percentage</th>
			<th width="120">skill</th>
			<th width="120">rating(1-10)</th>
			<th width="120">Certificates</th>
        </tr>  
        <?php  
		$con=pg_connect("host=localhost port=5432 dbname=innovation_center user=postgres password=admin");
	if(!$con){
		die('Connection error:'.pg_last_error());
	}
	else
	{
		echo 'connected';
		$i=0;
		$student_query="SELECT student_id,sname,course,branch,course_year,semester,email,mobile,others_info,id from student_info";
		$rs=pg_query($con,$student_query) or die("Cannot execute query: Student\n");
		while($row=pg_fetch_row($rs)){$i++;
		 	echo '  
			<tr>
			<td>'.$i.'</td>
			<td>'.$row[0].'</td>  
			<td>'.$row[1].'</td>  
			<td>'.$row[2].'</td> 
			<td>'.$row[3].'</td>
			<td>'.$row[4].'</td>
			<td>'.$row[5].'</td>
			<td>'.$row[6].'</td>
			<td>'.$row[7].'</td>
			<td>'.$row[8].'</td> 
			<td colspan="3"><table width="100%" border="1">';  
			$academic_query="SELECT qualification,course_year,percentage from academic_details where student_id=$row[9]";
			$rs1=pg_query($con,$academic_query) or die("Cannot execute query: Academics \n");
			while($academic=pg_fetch_row($rs1)){
		 	echo ' <tr> 
			<td width="120">'.$academic[0].'</td>  
			<td width="120">'.$academic[1].'</td>  
			<td width="120">'.$academic[2].'</td> 
			</tr>';
			}
			echo '</table></td><td colspan="3"><table width="100%" border="1">';
			$languages_query="SELECT skill,rating,certificate from languages where student_id=$row[9]";
			$rs2=pg_query($con,$languages_query) or die("Cannot execute query: Languages \n");
			while($languages=pg_fetch_row($rs2)){
		 	echo ' <tr> 
			<td width="120">'.$languages[0].'</td>  
			<td width="120">'.$languages[1].'</td>  
			<td width="120">'.$languages[2].'</td> 
			</tr>';
			}
			echo '</table></td></tr>';
		}
	}
?>  
    </table> <a href="excel_export.php"> Export To Excel </a> </body>  
  
</html>  
