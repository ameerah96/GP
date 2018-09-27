<?php
require('db.php');
session_start();// Starting Session
if(!$_SESSION['auth'])
     header("location:login.php");
 else{
 	//setting a timeout for the session
 	     if(time()- $_SESSION['last_time'] > 180)
 		  header('location:logout.php');
 	     else
 	     $_SESSION['last_time']=time();

		//echo $_SESSION['username'];
 	/*
	function forcelogin(){
if(isset($_SESSION['username']) ){
		//echo $_SESSION['username'];
	}
else header("Location: / login.php");} */
//$username=$_SESSION['username'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter//
require('db.php');
//in this page i get information for (student_home_page, drop_semsetr_form)
$student_info=array();

$ID=$_SESSION['username'];

		$sql = "SELECT * FROM student WHERE student.ID='$ID'"; 
		$query = $link->query($sql);
		if(!$query){ 
			die('Query Failed' . mysqli_error($link));
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
		    }
						$sql1 = "SELECT * FROM advisor WHERE advisor.ID='$Avdisor_student'"; 
                       $query1 = $link->query($sql1);
                   if(!$query1){ 
		         	die('Query Failed' . mysqli_error($link));
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
                       $query2 = $link->query($sql2);
                   if(!$query2){ 
		         	die('Query Failed' . mysqli_error($link));
			       }
			        else{
			               if($row2 = $query2->fetch_assoc()){
			
					
					$number_of_dropped_semester= $row2['dropped_semester'];
					array_push($student_info,$number_of_dropped_semester);
			}
			}
				$student_info_json= json_encode($student_info);
				echo $student_info_json;
				
			}//big else

		
	
?>