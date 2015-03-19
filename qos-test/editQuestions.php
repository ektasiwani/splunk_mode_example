<?php
if(isset($_POST['desc'])){
if(!isset($_POST['iscorrect']) || $_POST['iscorrect'] == ""){
echo "Sorry, important data missing,please press back and continue. ";
exit();
}if(!isset($_POST['type']) || $_POST['type'] == "" ){
echo "Sorry,there was an error passing the form.please try again.";
exit();
}
require_once("conect.php");
$numb = $_POST['numb'];
$numb= (int)$numb;
$question1 = $_POST['desc'];
$question= mysqli_real_escape_string($con,trim($question1));
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
if((!$question) || (!$answer1) || (!$answer2) || (!$isCorrect)){
echo 'Sorry,All field must be field.';
exit();
}
}
if($type == 'mc'){
if((!$question) || (!$answer1) || (!$answer2) || (!$answer3) || (!$answer4) || (!$isCorrect)){
echo 'Sorry,All field must be field.';
exit();
}
}

$sql = mysqli_query($con,"UPDATE questions SET question='".$question."', type='".$type."' WHERE question_id='$numb'") or die (mysqli_error());
$lastId = mysqli_insert_id($con,);
mysqli_query($con,"UPDATE questions SET question_id='$numb' WHERE id='$lastId' LIMIT 1") or die (mysqli_error());
if($type == 'tf'){
if($isCorrect == "answer1"){
$sql2 = mysqli_query($con,"UPDATE answers SET answer='$answer1', correct='1' WHERE question_id='$numb'");
mysqli_query($con,"UPDATE answers SET answer='$answer2', correct='0' WHERE question_id='$numb'") or die(mysqli_error());
$msg='Thanks,your question has been changed';
header('location: editQuestions.php?msg='.$msg.'');
exit();
}
if($isCorrect == "answer2"){
$sql2 = mysqli_query ($con,"UPDATE answers SET answer='$answer2', correct='1' WHERE question_id='$numb'");
mysqli_query ($con,"UPDATE answers SET answer='$answer1', correct='0' WHERE question_id='$numb'") or die(mysqli_error());
$msg='Thanks,your question has been added';
header('location:editQuestions.php?msg='.$msg.'');
exit();}
}
if($type == 'mc'){
if($isCorrect == "answer1"){
$sql2= mysqli_query ($con,"UPDATE answers SET answer='$answer1', correct='1' WHERE question_id='$numb'");
mysqli_query($con,"UPDATE answers SET answer='$answer2', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer4', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer3', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());

$msg = 'Thanks,your question has been edited';
header('location:editQuestions.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer2"){
$sql2= mysqli_query ($con,"UPDATE answers SET answer='$answer2', correct='1' WHERE question_id='$numb'");
mysqli_query ($con,"UPDATE answers SET answer='$answer1', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer3', correct='0' WHERE question_id='$lastId'")or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer4', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
$msg = 'Thanks,your question has been edited';
header('location:editQuestions.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer3"){
$sql2= mysqli_query ($con,"UPDATE answers SET answer='$answer3', correct='1' WHERE question_id='$numb'");
mysqli_query ($con,"UPDATE answers SET answer='$answer1', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer2', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer4', correct='0' WHERE question_id='$lastId'") or die(mysqli_error());
$msg = 'Thanks,your question has been edited';
header('location:editQuestions.php?msg='.$msg.'');
exit();}
if($isCorrect == "answer4"){
$sql2= mysqli_query ($con,"UPDATE answers SET answer='$answer4', correct='1' WHERE question_id='$numb'");
$sqla = mysqli_query($con,"SELECT id FROM answers WHERE answer='$answer4', correct='1'" );
mysqli_query ($con,"UPDATE answers SET answer='$answer1', correct='0' WHERE question_id='$numb', id='$sqla'")or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer2', correct='0' WHERE question_id='$numb' , id='$sqla+1'") or die(mysqli_error());
mysqli_query ($con,"UPDATE answers SET answer='$answer3', correct='0' WHERE question_id='$numb' , id='$sqla+2'")or die(mysqli_error());
$msg = 'Thanks,your question has been edited';
header('location:editQuestions.php?msg='.$msg.'');
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

<! DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Quize</title>
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
<div style="width:700px; margin-left:auto;margin-right:auto;text-align:center;">
<p style="color:red;"><?php echo $msg; ?></p>
<h2>Select which quiz you want to edit</h2>
<button onClick="showDiv('tf','mc')">True/False</button>&nbsp;&nbsp;<button onClick="showDiv('mc','tf')">Multiple choice</button>&nbsp;&nbsp;
<span id="resetBtn"><button onclick="resetQuiz()">Reset quiz to zero</button></span>
</div>
<div class="content" id="tf">
<h3> True or False</h3>
<form action="editQuestions.php" name="addQuestion" method="post">
<strong>type question number</strong>
</br>
<textarea id="tfDesc" name="numb" style="width:60px; height:25;"></textarea>
<strong>type question</strong>
</br>
<textarea id="tfDesc" name="desc" style="width:400px; height:95;"></textarea>
</br>
<strong>select true or false</strong>
</br>
<input type="text" id="answer1" name="answer1" value="True" readonly>&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
</br></br>
<strong>Please create the second answer for question</strong>
</br><input type="text" id="answer2" name="answer2" value="False" readonly>&nbsp;
<label style="cursor:pointer; color:#06F;">
<input type="radio" name="iscorrect" value="answer2">Correct Answer?</label>
</br></br>
<input type="hidden" value="tf" name="type">
<input type="submit" value="Add to Quiz">
</form>
</div>
<div class="content" id="mc">
<h3>Multiple Choice</h3>
<form action="editQuestions.php" name="addMcQuestion" method="post">
<strong>Type Question number</strong>
</br>
<textarea id="mcDesc" name="numb" style="width:60px; height:25;"></textarea>
</br>
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
</body>
</html>