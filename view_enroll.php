<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_academic_advisor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'SELECT ID_course, name,credit_hours FROM course';
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
	{
		$exists = $conn->query('select ID from enroll_course where ID_course = $row["ID_course"] and ID_student =$_POST["ID_student"] ');
        if( $exists ) 
		{
			$status = $conn->query('select status from enroll_course where ID =$exists["ID"]');
		   if ($status == "fail" or $status == "dropped" )
		   {
			   $possible_courses->$row["name"] = $row["credit_hours"];

		   }
		}
		$requisite =$conn->query('select requisite_ID from requisite where course_ID = $row["ID_course"] and type = "pre"');
		if( $requisite)
		{
		$exists = $conn->query('select ID from enroll_course where ID_course = $requisite["requisite_ID"] and ID_student =$_POST["ID_student"] ');
        if( $exists )
		{
		$status = $conn->query('select status from enroll_course where ID = ID =$exists["ID"]');
		   if ($status == "pass")
		   {
			   $possible_courses[$row["name"]] = $row["credit_hours"];

		   }	
		}			
		}
		$possible_courses[$row["name"]] = $row["credit_hours"];
		
    }
	?>
	<script>
	
	 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     $_POST['document'].getElementById("courses").innerHTML = <?php json_decode($possible_courses)?>;;
    }
  };
  xhttp.open("POST", "index.html", true);
  xhttp.send(<?php $possible_courses ?>);
	</script>

<?php
} 

//	print_r( json_encode($possible_courses));
//header('Content-Type: application/json');
else {
    echo "0 results";
}
//include ("index.html");
$conn->close();
?>

