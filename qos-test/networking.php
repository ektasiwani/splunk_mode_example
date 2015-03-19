<?php
include("header.php");
require_once("conect.php");?>
<?php
global $con;
$msg="";
if(isset($_GET['msg'])){
$msg1=$_GET['msg'];
$msg= mysqli_real_escape_string($con,trim($msg1));
$msg=strip_tags($msg);
$msg= addslashes($msg);
}
 $singleSQL= mysqli_query($con,"SELECT max(q_number) FROM questions");
  while($row= mysqli_fetch_array($singleSQL)){
  $question_num= (int)$row['0'];
  }

?>
<! DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quize test</title>
<script>
function startQuiz(url){
 window.location = url;
 }
 </script>
 </head>

 <body>
 <div style="font-family: Monda,tahoma; font-size:30px; width: 500px; color:#4c7529; margin-left:120px;">
 <center><i>There will be total <?php echo $question_num; ?> Questions</i></center>
 </div>
 <br>
  <div id="maindiv" style="height: 600px;">
  <br>
 <?php echo $msg ; 
 if(loggedin())
 {?>
 <br><br>
 <center><img src= "header_files/c.jpg" width="600px" height="300px" style="margin-left:30px;" /></center>
 <center><h3 style="font-size:100%;"><br><br><br> Click below when you are ready to start the quiz</h3><br></center>
 <center><button style="margin-left:25px; width:100; height:40px; color:white; background-color:green;"  onClick="startQuiz('quiz.php?question=1')"><b>Attempt</b></button></center>
 
 <?php
 }elseif(!loggedin()) { 
 echo ' <center><br><br>&nbsp&nbsp&nbsp&nbsp<img src="header_files/d.jpg" width="600px" height="300px"></center>';
 echo ' <center><br><br><br>&nbsp&nbsp&nbsp&nbspPlease login first to take the test..<br><br></center>' ;
 echo  " <center>&nbsp&nbsp&nbsp&nbspFirst time user please register yourself to take test..<br><br></center>";
}
 ?>
 <br><br><br>
 </div>
 </body>
 </html>
 <?php include ("footer.php"); ?>