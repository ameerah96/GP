<?php
require('db.php');
session_start();// Starting Session
if(!$_SESSION['auth'])
     header("location:login.php");
 else{


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
else header("Location: / login.php");


}
*/
$username=$_SESSION['username'];

// Establishing Connection with Server by passing server_name, user_id and password as a parameter//
//require('db.php');
if(!($link = mysqli_connect("localhost","root","", "e_academic_advisor")))
  die("could not connect to database");

if(!($db =mysqli_select_db($link, "e_academic_advisor")))
echo "could not ewxecute query";

// Selecting Database
$data="SELECT GPA, last_name, first_name FROM student WHERE ID='$username'";

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($link, $data);
$rows = mysqli_num_rows($query);

// Storing Session
// SQL Query To Fetch Complete Information Of User
if($rows == 0){
	echo "ptoblr";
}

else{
	while($row = mysqli_fetch_row($query))
foreach($row as $key => $value)
print("$value");
 
}
/*
	$gpa =5;
//$rows['GPA'];
//$last_name=$rows['last_name'];
echo "your GPA is ". $gpa;
echo $rows['last_name'];
*/
}

mysqli_close($link); // Closing Connection
//header('Location: login.php'); // Redirecting To Home Page

  ?>
