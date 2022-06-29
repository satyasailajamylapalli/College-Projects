<?php


$con=pg_connect("host=localhost port=5432 dbname=innovation_center user=openpg password=admin");
	if(!$con){
		die('Connection error:'.pg_last_error());
	}
	else
	{
		$query1="select count(*) from login where uname='$_POST[uname]' and pswrd='$_POST[pswd]'";
		$rs=pg_query($con,$query1) or die("Cannot execute query: $query1\n");
		while($row=pg_fetch_row($rs)){
			$i=$row[0];
			if($i==1){
			header("Location: excel_export.php");
			}
			else{
			echo '<script>if(!alert("user name or password incorrect"))window.history.back();</script>';
			
			}
		//include("report.php");
			}
	}
?>