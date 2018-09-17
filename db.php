<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter

if(!($link = mysqli_connect("localhost","root","", "e_academic_advisor")))
  die("could not connect to database");

if(!($db =mysqli_select_db($link, "e_academic_advisor")))
echo "could not ewxecute query";

?>