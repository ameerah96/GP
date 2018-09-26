<?php
//in this page i get information for (student_home_page, drop_semsetr_form)
require"dbConnect.php";	
$student_info=array();

if (!session_id()){
session_start();}
if (!$_SESSION['logon']){ 
echo"gg";
    die();
}
else{
$ID=$_SESSION['email'];

		$sql = "SELECT * FROM student WHERE student.ID='$ID'"; 
		$query = $conn->query($sql);
		if(!$query){ 
			die('Query Failed' . mysqli_error($conn));
			}else{
			if($row = $query->fetch_assoc()){
			
					$name= $row['first_name'];
					$second=$row['last_name'];
					$name.= " ".$second;
		      array_push($student_info,$name);
			  		      array_push($student_info,$ID);

			  $level=$row['level'];
		      array_push($student_info,$level);
              $GPA=$row['GPA'];
		      array_push($student_info,$GPA);
$Avdisor_student=$row['ID_advisor'];
		        }
						$sql1 = "SELECT * FROM advisor WHERE advisor.ID='$Avdisor_student'"; 
                       $query1 = $conn->query($sql1);
                   if(!$query1){ 
		         	die('Query Failed' . mysqli_error($conn));
			       }
			        else{
			               if($row1 = $query1->fetch_assoc()){
			
					$advisor_name= $row1['first_name'];
					$advisor_Last_name= $row1['last_name'];
                     $advisor_name.=" ".$advisor_Last_name;
					array_push($student_info,$advisor_name);
			}
			}
			
			$sql2 = "SELECT * FROM plan WHERE plan.ID_student='$ID'"; 
                       $query2 = $conn->query($sql2);
                   if(!$query2){ 
		         	die('Query Failed' . mysqli_error($conn));
			       }
			        else{
			               if($row2 = $query2->fetch_assoc()){
			
					
					$number_of_dropped_semester= $row2['dropped_semester'];
					array_push($student_info,$number_of_dropped_semester);
			}
			}
				$student_info_json= json_encode($student_info);
				echo $student_info_json;
				
			}
		}
		
	
?>
