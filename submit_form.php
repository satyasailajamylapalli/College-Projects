<?php	
	$qualification=$_POST['qualification'];
	$qyear=$_POST['qyear'];
	$per=$_POST['per'];
	$skill=$_POST['skill'];
	$rate=$_POST['rate'];
	$certify= $_POST['certify'];
	$e_certificates=$_POST['certificates'];
	$problem=$_POST['problem'];
	$solution=$_POST['solution'];
	$details=$_POST['details'];
	$idea=$_POST['idea'];
	$domain=$_POST['domain'];
	
	$con=pg_connect("host=localhost port=5432 dbname=innovation_center user=openpg password=admin");
	if(!$con){
		die('Connection error:'.pg_last_error());
	}
	else
	{
		echo 'connected';
		$student_query = "INSERT INTO student_info(sname, student_id, email, mobile, course, branch, course_year, semester, others_info, create_date, write_date) VALUES ('$_POST[sname]', '$_POST[rollno]', '$_POST[email]', $_POST[mobile], '$_POST[course]', '$_POST[branch]', $_POST[year], $_POST[semester], '$_POST[others]', current_timestamp, current_timestamp)";
		$student_result = pg_query($student_query)  or die("Cannot execute query: "+$student_query+"\n");
	if ($student_result > 0){
		echo 'one row executed: student';
		$id_query="SELECT id from student_info where student_id='$_POST[rollno]'";
		$rs=pg_query($con,$id_query) or die("Cannot execute query: \n");
		while($row=pg_fetch_row($rs)){
			$id=(int)$row[0]; 	
		}
		echo $id;
		for($i=0;$i<count($qualification);$i++)
		{
			if($qualification[$i]=="" || $qyear[$i]=="" || $per[$i]=="")
			{continue;
			}
			
			$academic_result=pg_query("INSERT INTO academic_details(qualification, course_year, percentage, create_date, write_date,student_id) VALUES ('$qualification[$i]', $qyear[$i], $per[$i], current_timestamp, current_timestamp,$id )") or die("Cannot execute query: Insert academics\n");
		
		if($academic_result>0){
		echo 'one row executed: academics';
		}
		}
		
		for($i=0; $i<count($skill); $i++){
			if($skill[$i]=="" || $rate[$i]==""){
				continue;
			}
			$language_result=pg_query("INSERT INTO languages(skill,rating,certificate,create_date,write_date,student_id) VALUES('$skill[$i]',$rate[$i],'$certify[$i]',current_timestamp,current_timestamp,$id)") or die("Cannot execute query: Insert languages\n");
		
		if($language_result>0){
		echo 'one row executed: languages';
		}
		}
		
		for($i=0; $i<count($e_certificates); $i++){
			if($e_certificates[$i]==""){
				continue;
			}
			$certificate_result=pg_query("INSERT INTO certificates(certificate,create_date,write_date,student_id) VALUES('$e_certificates[$i]',current_timestamp,current_timestamp,$id)") or die("Cannot execute query: Insert certificates\n");
		
		if($certificate_result>0){
		echo 'one row executed: certificates';
		}
		}
		
		for($i=0; $i<count($problem); $i++){
			if($problem[$i]=="" || $solution[$i]=="" || $details[$i]==""){
				continue;
			}
			$innovative_result=pg_query("INSERT INTO innovative_solutions(problem,solution,implementation,create_date,write_date,student_id) VALUES('$problem[$i]','$solution[$i]','$details[$i]',current_timestamp,current_timestamp,$id)") or die("Cannot execute query: Insert innovative_solutions\n");
		
		if($innovative_result>0){
		echo 'one row executed: innovative solutions';
		}
		}
		
		for($i=0; $i<count($idea); $i++){
			if($idea[$i]=="" || $domain[$i]==""){
				continue;
			}
			$idea_result=pg_query("INSERT INTO new_ideas(idea,domain_impact,create_date,write_date,student_id) VALUES('$idea[$i]','$domain[$i]',current_timestamp,current_timestamp,$id)") or die("Cannot execute query: Insert ideas\n");
		
		if($idea_result>0){
		echo 'one row executed: ideas';
		}
		}
		
	}
}

 ?>