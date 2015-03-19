<?php include("header.php"); ?>
<?php
if(isset($_POST['radio']) && $_POST['radio'] != ""){
$answer = preg_replace('/[^0-9]/'," ", $_POST['radio']);
if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
$_SESSION['answer_array']= array($answer);
}else{
array_push($_SESSION['answer_array'], $answer);
} 
}
if(isset($_POST['qid']) && $_POST['qid'] != ""){
$qid = preg_replace('/[^0-9]/', " `", $_POST['qid']);
if(!isset($_SESSION['q id_array']) || count($_SESSION['qid_array']) < 1){
$_SESSION['qid_array']=array($qid);
}else{
array_push($_SESSION['qid_array'],$qid);
}
$_SESSION['lastQuestion']=$qid;
}
?>
<?php
require_once("conect.php");
$response = "";
if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array'])<1){
$response = "You have not answer any question yet";
?><div id="maindiv" style="height:500px;">
<div style="margin-left:20px;">
<br>
<?php
echo $response; ?>
<br><br></div></div>
<?php include("footer.php"); ?>
<?php
exit();
}else
{$countCheck = mysqli_query($con,"SELECT id FROM ccse_questions") or die(mysqli_error());
$count = mysqli_num_rows($countCheck);

$numCorrect = 0;
foreach($_SESSION['answer_array'] as $current){
if($current==1){
$numCorrect++;}
}
$percent = $numCorrect/$count * 100;
$percent = intval($percent);
$type = $_POST['type'];
if(isset($_POST['complete']) && $_POST['complete']== "true"){
if((!isset($_POST['username']) || $_POST['username']=="")) {?>
<div id="maindiv">
<div style="margin-left:20px;">
<br>
<?php
echo "sorry, we had an error";
?>
<br><br></div></div>
<?php include("footer.php"); ?>
<?php
exit();
}
$username = $_POST['username'];
$type = $_POST['type'];
$username = mysqli_real_escape_string($con,$username);
$username = strip_tags($username);
$type = mysqli_real_escape_string($con,$type);
$type = strip_tags($type);
if(!in_array("1",$_SESSION['answer_array'])){
$sql= mysqli_query($con,"INSERT INTO quiz_takers (username,percentage,date_time,type,date) VALUES ('$username','0',now(),'$type',now())") or die(mysqli_error());
echo "Your scored % is";
unset($_SESSION['answer_array']);
unset($_SESSION['qid_array']);
session_destroy();
exit();
}
$sql= mysqli_query($con,"INSERT INTO quiz_takers (username , percentage,date_time,type,date) VALUES ('$username','$percent',now(),'$type',now())") or die(mysqli_error());
?>
<div  id="maindiv" style="height:540px;">
<div style="margin-left:20px;">
<br>
<?php
if($percent >= 60 ){
echo"Thanks for taking test, your score is $percent% . CLEARED ";}
else{
echo "Thanks for taking test, your score is $percent% . NOT CLEARED ";}
?>
<br><br>
</div>
</div>
<?php include("footer.php"); ?>
<?php
unset($_SESSION['answer_array']);
unset($_SESSION['qid_array']);
session_destroy();
exit();
}
}
?>
<?php include("footer.php"); ?>