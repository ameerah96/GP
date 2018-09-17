<?php
session_start();

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
<?php
require('db.php');



if (isset($_POST['login']))  {
 
if (empty($_POST['username']) || empty($_POST['pass'])) {
echo "<p class='er'>Username or Password is invalid</p>";
}


else
{ 
// Define $username and $password
$username=$_POST['username'];
$pass=$_POST['pass'];

//$hash=password_hash($pass, PASSWORD_BE)
//$pass=md5($_POST['pass']);


// Selecting Database
$data="SELECT GPA from student WHERE password='$pass' AND ID='$username'";

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($link, $data);
$rows=0;
$rows = mysqli_num_rows($query);

}
if ($rows == 1) {
  $_SESSION['username']=$username; // Initializing Session
  $_SESSION['auth']='true';
  $_SESSION['last_time']=time();    //setting a timeout for the session
header("location: profile.php"); // Redirecting to another page
} 
else{
 echo "Invalid username or password</p>";
 
}

mysqli_close($link); // Closing Connection


}

?>
  
</body>

</html>
