<?php
session_start();
require_once("conect.php");
global $con;
$arrCount= "";
if(isset($_GET['question'])){
$question1= preg_replace('/[^0-9]/',"", $_GET['question']);
$question= mysqli_real_escape_string($con,trim($question1));
$output = "";
$output= mysqli_real_escape_string($con,trim($output));
$answers= "";
$q="";
$sql=mysqli_query($con,"SELECT id FROM questions");
$numQuestions = mysqli_num_rows($sql);
if(!isset($_SESSION['answer_array']) || $_SESSION['answer_array']< 1){
 $currQuestion =  "1";
 }else {
 $arrCount = count($_SESSION['answer_array']);
 }
 
  if($arrCount>=$numQuestions){
  echo 'finished|<p>There is no more questions. Please enter your first and last name</p>
  <form action="userAnswers.php" method="post">
  <input type="hidden" name="complete" value="true">
  <input type="text" name="username"><br>
  <p>enter test name</p><br>
  <input type="text" name="type">
  <input type="submit" value="Finish">
  </form>';
  exit();
  }
  $singleSQL= mysqli_query($con,"SELECT * FROM questions WHERE id='".$question."' LIMIT 1");
  while($row= mysqli_fetch_array($singleSQL)){
  $id= (int)$row['id'];
  $thisQuestion = $row['question'];
  $thisQuestion= mysqli_real_escape_string($con,trim($thisQuestion));
  $type = $row['type'];
  $numb = $row['q_number'];
  $type= mysqli_real_escape_string($con,trim($type));
  $question_id=(int)$row['question_id'];
  $q= '<h2>'.$thisQuestion.'</h2>';
  $sql2 = mysqli_query($con,"SELECT * FROM answers WHERE question_id='".$question."' ORDER BY rand()");
  while($row2= mysqli_fetch_array($sql2)){
  $answer= $row2['answer'];
  $answer= mysqli_real_escape_string($con,trim($answer));
  $correct= $row2['correct'];
  $correct= mysqli_real_escape_string($con,trim($correct));
  $answers .= '<label style="cursor:pointer;"><input type="radio" name="rads" value="'.$correct.'">'.$answer.'</label>
  <input type="hidden" id="qid" value="'.$id.'" name="qid"></br>';
  }
  echo '<div style = "font-size:20px;">'.'Question Number'.' &nbsp' .'<b>'.$numb.'</b>'.'</div>'.'<br>';
  $output = ' '.$q.','.$answers.',<br><span id="btnSpan"><button onclick="post_answer()">Submit</button></span>';
  
  echo $output;
  
  }
  }
  ?>