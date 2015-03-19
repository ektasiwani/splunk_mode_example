<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>
<?php
if(isset($_POST['desc'])){
if(!isset($_POST['iscorrect']) || $_POST['iscorrect'] == ""){?>
<div style="color:blue; margin-left:176px; width:600px; font-size:40;">Sorry, important data missing,please press back and continue.</div>
<?php
exit();
}if(!isset($_POST['type']) || $_POST['type'] == "" ){?>
<div style="color:blue; margin-left:176px; width:600px; font-size:40;">Sorry,there was an error passing the form.please try again</div>
<?php
exit();
}
require_once("conect.php");
$question1 = $_POST['desc'];
$question= mysqli_real_escape_string($con,trim($question1));
$numb=$_POST['numb'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];
$answer3=$_POST['answer3'];
$answer4=$_POST['answer4'];
$type1=$_POST['type'];
$type= mysqli_real_escape_string($con,trim($type1));
$type=preg_replace('/[^a-z]/', "", $type);
$isCorrect = preg_replace('/[^0-9a-z]/', "", $_POST['iscorrect']);
$answer1= strip_tags($answer1);
$answer1=mysqli_real_escape_string($con,$answer1);
$answer1= strip_tags($answer1);
$answer2=mysqli_real_escape_string($con,$answer2);
$answer2= strip_tags($answer2);
$answer3=mysqli_real_escape_string($con,$answer3);
$answer3= strip_tags($answer3);
$answer4=mysqli_real_escape_string($con,$answer4);
$answer4= strip_tags($answer4);
$question=mysqli_real_escape_string($con,$question);
$question= strip_tags($question);
if($type== 'tf'){
if((!$question) || (!$answer1) || (!$answer2) || (!$isCorrect) || (!$numb)){?>
<div style="color:blue; margin-left:176px; width:600px; font-size:40;">Sorry,All field must be field.</div>
<?php
exit();
}
}
if($type == 'mc'){
if((!$question) || (!$answer1) || (!$answer2) || (!$answer3) || (!$answer4) || (!$isCorrect) || (!$numb)){?>
<div style="color:blue; margin-left:176px; width:600px; font-size:40;">Sorry,All field must be field.</div>
<?php
exit();
}
}
$sql = mysqli_query($con,"INSERT INTO ccsa_questions (question,type,q_number) VALUES ('".$question."','".$type."','".$numb."')") or die (mysqli_error());
$lastId = mysqli_insert_id($con);
mysqli_query($con,"UPDATE ccsa_questions SET question_id='$lastId' WHERE id='$lastId' LIMIT 1") or die (mysqli_error());
if($type == 'tf'){
if($isCorrect == "answer1"){
$sql2 = mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','0')") or die(mysqli_error());
$msg='Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();
}
if($isCorrect == "answer2"){
$sql2 = mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','0')") or die(mysqli_error());
$msg='Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();}
}
if($type == 'mc'){
if($isCorrect == "answer1"){
$sql2= mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer3','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer4','0')") or die(mysqli_error());
$msg = 'Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer2"){
$sql2= mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer3','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer4','0')") or die(mysqli_error());
$msg = 'Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer3"){
$sql2= mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer3','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer4','0')") or die(mysqli_error());
$msg = 'Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer4"){
$sql2= mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer4','1')");
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer1','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer2','0')") or die(mysqli_error());
mysqli_query($con,"INSERT INTO ccsa_answers (question_id,answer,correct) VALUES ('$lastId','$answer3','0')") or die(mysqli_error());
$msg = 'Thanks,your question has been added';
header('location:addQuestions_ccsa.php?msg='.$msg.'');
exit();}
}
}
?>
<?php
$msg="";
if(isset($_GET['msg'])){
$msg= $_GET['msg'];
$msg= mysqli_real_escape_string($con,trim($msg));
}?>
<?php
//for deleting question.
if(isset($_POST['reset'])&& $_POST['reset'] != ""){
$reset = preg_replace('/^[a-z]/',"",$_POST['reset']);
mysqli_query($con,"TRUNCATE TABLE ccsa_questions") or die(mysqli_error());
mysqli_query($con,"TRUNCATE TABLE ccsa_answers") or die(mysqli_error());
//check if delete or not.
$sql1= mysqli_query($con,"SELECT id FROM ccsa_questions LIMIT 1") or die(mysqli_error());
$sql2= mysqli_query($con,"SELECT id FROM ccsa_answers LIMIT 1") or die(mysqli_error());
$numQuestions=mysqli_num_rows($sql1);
$numAnswers=mysqli_num_rows($sql2);//if result is greater then 0 then not delete.
if($numQuestions > 0 || $numAnswers > 0){?>
<div style="color:blue; margin-left:176px; width:700px; font-size:40;">Sorry, there was a problem reseting the quiz. Please try again later.</div>
<?php
}else{?>
<div style="color:blue; margin-left:176px; width:600px; font-size:40;">Thanks! The quiz has now been reset back to 0 questions.</div>
<?php
}}
?>
<! DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create Quize</title>
<script>
function showDiv(el1,el2){
document.getElementById(el1).style.display = 'block';
document.getElementById(el2).style.display = 'none';
}
</script>
<style>
.content{
margin-top:48px;
margin-left:auto;
margin-right:auto;
width:780px;
border:#333 1px solid;
border-radius:12px;
-moz-border-radius:12px;
padding:12px;
display:none;
}</style>
</head>
<body>
<div id="maindiv" style="height:870px;">
<div style="width:700px; margin-left:auto;margin-right:auto;text-align:center;">
<p style="color:red;"><?php echo $msg; ?></p>
<h2 style="font-size: 30px; font-style:tossiba;">What type of quiz you want to create?</h2><br>
<button onClick="showDiv('tf','mc')">True/False</button>&nbsp;&nbsp;<button onClick="showDiv('mc','tf')">Multiple choice</button>&nbsp;&nbsp;
<br><br><form  style="font-size: 20px; font-style:tahoma;" action="addQuestions_ccsa.php"  method="post">
<input type="submit" value="Reset quiz to zero" name="reset" style="color:red"; ></form>
</div>
<div class="content" id="tf">
<center><u><h3 style="font-size: 20px; font-style:tahoma;"> True or False</h3></u></center>
<form  style="font-size: 20px; font-style:tahoma;" action="addQuestions_ccsa.php" name="addQuestion" method="post">
<strong>Question Number</strong>
<br>
<input type="text" id="numb" name="numb" style="width:40px; "></input>
<br><br>
<strong>type question</strong>
<br><br>
<textarea id="tfDesc" name="desc" style="width:400px; height:95;"></textarea>
<br><br>

<strong>select true or false</strong>
<br><br>
<input type="text" id="answer1" name="answer1" value="True" readonly>&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
<br><br>
<input type="text" id="answer2" name="answer2" value="False" readonly>&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer2">Correct Answer?</label>
<br><br>
<input type="hidden" value="tf" name="type">
<input type="submit" value="Add to Quiz">
</form>
</div>
<div class="content" id="mc">
<center><u><h3 style="font-size: 20px; font-style:tahoma;">Multiple Choice</h3></u></center>
<form style="font-size: 20px; font-style:tahoma;" action="addQuestions_ccsa.php" name="addMcQuestion" method="post">
<strong>Question Number</strong>
<br><br>
<input type="text" id="mfnumb" name="numb" style="width:40px; "></input>
<br><br>
<strong>Type Question</strong>
</br>
<textarea id="mcDesc" name="desc" style="width:400px; height:95;"></textarea>
</br>
<strong>Create first answer</strong>
</br>
<input type="text" id="mcanswer1" name="answer1">&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
</br></br>
<strong>Create second answer</strong>
</br>
<input type="text" id="mcanswer2" name="answer2">&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer2">Correct Answer?</label>
</br></br>
<strong>Create third answer</strong>
</br>
<input type="text" id="mcanswer3" name="answer3">&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer3">Correct Answer?</label>
</br></br>
<strong>Create fourth answer</strong>
</br>
<input type="text" id="mcanswer4" name="answer4">&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer4">Correct Answer?</label>
</br></br>
<input type="hidden" value="mc" name="type">
<input type="submit" value="Add to Quiz">
</form></div>
</div><div class="clear">
</div>
</body>
</html>
<?php include("footer.php"); ?>