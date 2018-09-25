<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="login.css">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

</head>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h4>
    <img src="logo.jpg" alt="EAA logo" height="80px" width="120px"></h4>

  <input name="username" type="text" placeholder="Enter Username"/>
  <input name="pass" type="password" placeholder="Enter Password"/>
<div class="radio">
     <input type="radio" name="type_of_user" value="Student"/>Student <br>   
    <input  type="radio" name="type_of_user" value="Advisor"/>Advisor
</div>

  <input class="button" type="submit" name="login"/>
  </form>

<?php
require('db.php');
if (isset($_POST['login'])) {
      $user_type="";
     
      if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['type_of_user']) ) {
        echo "<p class='er'>All fields are required</p>";
                  } 
                                                       
else {       
// Define $username and $password
$username=$_POST['username'];
$pass=$_POST['pass'];
$username= mysqli_real_escape_string($link, $username);
$pass= mysqli_real_escape_string($link, $pass);

      $user_type= $_POST['type_of_user'];
      if($user_type=="Student"){                
// Selecting Database
$data="SELECT * from student WHERE ID='$username'";
//if(password_verify($password, $hashed_password)) {} 
$query = mysqli_query($link, $data);
$rows = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($rows == 1  && password_verify($pass, $row['password']) ) {
                            
                 $_SESSION['username']=$username; // Initializing Session
                 $_SESSION['auth']='true';
                $_SESSION['last_time']=time(); 
header("location: profile.php"); // Redirecting to another page
            }//if rows
            else { 
              echo "<p class='er'>Username or Password is invalid</p>";
            }

}//student
                     // second user
//if
if($user_type=="Advisor"){                
// Second User, Advisor
// Selecting Database
$data="SELECT * from advisor WHERE ID='$username'";
$query = mysqli_query($link, $data);
//$rows=0;
$rows = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($rows == 1  && password_verify($pass, $row['password']) ) {
               $_SESSION['username']=$username; // Initializing Session
                $_SESSION['auth']='true';
                $_SESSION['last_time']=time();    //setting a timeout for the session
                header("location: profile.php"); // Redirecting to another page
            }       
           else echo "<p class='er'>Username or Password is invalid</p>";

         
}//advisor

}//else 
}   //big if
       
mysqli_close($link); // Closing Connection

?>  


</body>
</html>