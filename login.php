<?php
session_start();
ob_start();
require"dbConnect.php";	
if(isset($_POST['login'])){
	
	$username= mysqli_real_escape_string($conn ,htmlspecialchars($_POST['username']) ) ;
	
$password= mysqli_real_escape_string($conn ,htmlspecialchars($_POST['pass']) ) ;
$sql = "SELECT * 
		FROM student 
		where student.ID='$username'
		and student.password='$password'" ; 
		
$log_in = $conn->query($sql);
		
			if(!$log_in ){
				die('Query Failed' . mysqli_error($conn));
				}else{
	if($row=$log_in->fetch_assoc()){
	//بحتاج ها السطر باللوغ ان مشان اقدر جيب الاي دي تيع الطالب
		$_SESSION['email']=$row['ID'];
//وبحتاج هدول التلت سطور كمان 
/*	if(!session_id())
		session_start();
	$_SESSION['logon']=true;*/
	
	
	header('Location:student_home_page.php');
die();	

	}
else {echo' <script>window.alert("User name or password is invalid")</script>';}


				}

}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="login.css">

  
</head>

<body>

  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h4> Login Information </h4>
  <input name="username" class="username" type="text" placeholder="Enter Username"/>
  <input name="pass" class="pass" type="password" placeholder="Enter Password"/>
  <li><a href="#">Forgot your password?</a></li>
  <input class="button" type="submit" name="login"/>
</form>

  
</body>

</html>