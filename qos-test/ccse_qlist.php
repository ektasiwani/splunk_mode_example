<?php include("header.php"); ?>


 <div id="maindiv" >
<?php
require_once("conect.php");

  //query for question
  $singleSQL= mysqli_query($con,"SELECT * FROM ccse_questions WHERE type='mc'");
  
  while($row= mysqli_fetch_array($singleSQL)){
  $id= (int)$row['id'];
  $thisQuestion = $row['question'];
  $thisQuestion= mysqli_real_escape_string($con,trim($thisQuestion));
  $type = $row['type'];
  $numb = $row['q_number'];
  $type= mysqli_real_escape_string($con,trim($type));
  $question_id=(int)$row['question_id'];
  
  //for answers query
  $sql2 = mysqli_query($con,"SELECT answer FROM ccse_answers WHERE question_id='".$question_id."' AND correct = '1'");
  while($row2= mysqli_fetch_array($sql2)){
  $answer= $row2['answer'];
  $answer= mysqli_real_escape_string($con,trim($answer));
 
  }
echo '<div style="margin-left:20px; font-size:17px; font-family:tahoma;">'.'<span style="color:#c00000;">Question :  </span>'.'&nbsp'.$thisQuestion.'<br>'.'<br>'.'</div>' ;
  echo '<div style="margin-left:20px; font-size:17px; font-family:tahoma;">'.'<span style="color:green;">Answer :  </span>'.'&nbsp'.$answer.'<br>'.'<br>'.'<br>'.'<br>'.'</div>' ;

 }
 
// free result set memory


mysqli_free_result($singleSQL);

mysqli_free_result($sql2);


?>
<br><br>
</div><div class="clear">
</div>
  
