<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>


<?php

$type = 'ccsa';
$query = "SELECT * FROM quiz_takers WHERE type='".$type."'  limit 10 ";
 
 $result= mysqli_query($con,$query) or die(mysqli_error());


?>
 <div id="maindiv" style="min-height:540px;">
<?php
 if (mysqli_num_rows($result) > 0){
define('COLS', 3); // number of columns
$col = 0; // number of the last column filled

echo '<table border="8px" style="width:500px">';
echo '<tr>'; // start first row

while ($rows = mysqli_fetch_array($result))
{

 $col++;
  if ($col == COLS) // have filled the last row
  { $col = 0;
    echo '</tr><tr>'; // start a new one
  }
  echo '<tr>';
   echo '<th>', '<center>', '<br>','<br>','<br>', '&nbsp','<b>','Username','</b>','&nbsp','<br>', '<br>','<br>', '</center>', '</th>';
  echo '<th>', '<center>', '<br>','<br>','<br>', '&nbsp','<b>','Percentage','</b>','&nbsp&nbsp', '<br>', '<br>','<br>', '</center>', '</th>';
  echo '<th>', '<center>',  '<br>','<br>','<br>', '&nbsp','<b>','Date and time','</b>','&nbsp&nbsp','<br>','<br>','<br>', '</center>', '</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>', '<center>','<br>', mysqli_real_escape_string($con,trim($rows[1])) ,'<br>','<br>','<br>','<br>', '</center>', '</td>';
  echo '<td>', '<center>','<br>',  (int)$rows[2] ,'<br>','<br>','<br>','<br>', '</center>', '</td>';
  echo '<td>', '<center>', '<br>', $rows[3],'<br>','<br>','<br>','<br>', '</center>', '</td>';
  echo '</tr>';

}
echo '</tr>'; // end last row
echo "</table>";
}
else{
   // print status message
   echo '<br>','<br>';
    echo "<center>","Sorry, No test result found","</center>";
} 
// free result set memory
mysqli_free_result($result);
?>
</div><div class="clear">
</div>
<?php include("footer.php"); ?>
