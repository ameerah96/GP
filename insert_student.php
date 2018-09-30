<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection

$conn = mysqli_connect("localhost","root","", "e_academic_advisor");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$pass="mun";
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
$sql = "INSERT INTO student (ID, first_name,last_name, GPA,level, password,ID_plan, ID_schedule,ID_advisor) VALUES ('435202500', 'Lena', 'Ali', '4.5','6','$hashed_password','22','12','436303675')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

