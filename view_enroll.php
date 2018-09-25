<?php
session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
//{
//echo "<META HTTP-EQUIV='Refresh' Content='1;URL=login.html'>";
//exit() ;	
//}
?>
<?php
require('db.php');
$try = array();
$time = array();
$possible_courses = [];
$GLOBALS["i"]=0;
$sql = 'SELECT ID_course, name,credits_hours FROM course';
$result = mysqli_query($link, $sql);
$rows = 0;
$rows = mysqli_num_rows($result);
if ($rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
	{
		// get sections of this course 
		$sections = $link->query('select section_ID,timeslot_ID,room_no from section where course_ID =$row["ID_course"]');
		//get time and date
		if ($sections)
		{
		while($section = $sections->fetch_assoc())
		{
		$section_time = $link->query('select * from time_slot where timeslot_ID = $section["timeslot_ID"]');
		array_push($time,$section_time);
		
		}
		}
		// check if the course is taken before or not 
		// if it is taken so check status of it 
		// if the status fail or dropped then the student can enroll
		$exists = $link->query('select ID from enroll_course where ID_course = $row["ID_course"] and ID_student =$_POST["student_ID"] ');
        if( $exists ) 
		{
			$status = $link->query('select status from enroll_course where ID =$exists["ID"]');
		   if ($status == "fail" or $status == "dropped")
		   {
			   array_push($possible_courses,array($row["name"],$row["credits_hours"]));
			   //$possible_courses[$GLOBALS["i"]] = array("name"=>$row["name"],"credit hours"=>$row["credits_hours"]);
				//$GLOBALS["i"] = $GLOBALS["i"] + 1 ;
		   }
		   // if the status not pass and not current then the student dosen't take the course but check the requisite
		   if ($status != "current" and $status !="pass")
			{
			$requisite =$link->query('select requisite_ID from requisite where course_ID = $row["ID_course"] and type = "pre"');
				if( $requisite)
				{
					$exists = $link->query('select ID from enroll_course where ID_course = $requisite["requisite_ID"] and ID_student =$_POST["ID_student"] ');
					if( $exists )
					{
					$status = $link->query('select status from enroll_course where ID = ID =$exists["ID"]');
					if ($status == "pass")
					{
						array_push($possible_courses,array($row["name"],$row["credits_hours"]));
				//$possible_courses[$GLOBALS["i"]] = array("name"=>$row["name"],"credit hours"=>$row["credits_hours"]);
				//$GLOBALS["i"] = $GLOBALS["i"] + 1 ;
					}	
					}			
				}
			}
		
		}
		array_push($possible_courses,array($row["name"],$row["credits_hours"]));
				//$possible_courses[$GLOBALS["i"]] = array("name"=>$row["name"],"credit hours"=>$row["credits_hours"]);
				//$GLOBALS["i"] = $GLOBALS["i"] + 1 ;		
    }
	$course_name_json= json_encode($possible_courses);
echo $course_name_json;
} 
//	print_r( json_encode($possible_courses));
//header('Content-Type: application/json');
else {
    echo "0 results";
}
?>



