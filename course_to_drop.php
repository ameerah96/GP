<?php
$course_name=array();
require"dbConnect.php";	

if (!session_id()){
session_start();}
if (!$_SESSION['logon']){ 
echo"gg";
    die();
}
else{
$email=$_SESSION['email'];

		$sql = "SELECT * FROM enroll_course WHERE enroll_course.ID_student='$email' and enroll_course.status='current'" ; 
		$query = $conn->query($sql);
		if(!$query){ 
			die('Query Failed' . mysqli_error($conn));
			}else{
			while($row = $query->fetch_assoc()){
				$Course= $row['ID_course'];
					$name= $row['name'];
                      array_push($course_name,$name);
	
		        }
				$course_name_json= json_encode($course_name);
				echo $course_name_json;
				/*$sql2 ="SELECT * FROM course WHERE ID_course='$Course'";
		$query2 = $conn->query($sql2);
if(!$query2){
				die('Query Failed' . mysqli_error($conn));

}
else{
				if($row2 = $query2->fetch_assoc()){
				$name= $row['name'];
				echo"       <div class='col-md-4 'style='float:right!important;border-color:green'>";

		echo"<br><br>";
				echo $name;
				}
}*/
			
		/*	for($x=0; $x<count($course_name); $x++){
		echo"       <div class='col-md-4 'style='float:right!important;border-color:green'>";
	echo"<br><br>";
				echo $course_name[$x];
			}*/
		}
		
	}
?>
