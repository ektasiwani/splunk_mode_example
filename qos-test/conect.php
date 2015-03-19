<?php
$con = mysqli_connect("localhost","root","q1w2e3","test");


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>