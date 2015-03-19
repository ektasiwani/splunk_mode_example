<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>
 <?php
 if(loggedin())
 {?>
<div id="maindiv" >
<br><br><br><br>
<center><u>Add Question</u></center>
<br><br>
<div style="width:140px; height:60px; background-color:pink; margin-left:140px; position:relative;  top:-0.1em; ">
<br>
<center><a href="addQuestions.php" STYLE="font-size:120%; text-decoration:none; color:solid black;">Networking</a></center>
</div>
<div style="width:140px; height:60px; background-color:green; margin-left:430px;  position:relative;  top: -3em; ">
<br>
<center><a href="addQuestions_ccsa.php" STYLE="font-size:130%; text-decoration:none; color:white;">CCSA</a></center>
</div>
<div style="width:140px; height:60px; background-color:YELLOW; margin-left:720px;  position:relative;  top: -5.7em; ">
<br>
<center><a href="addQuestions_ccse.php" STYLE="font-size:130%; text-decoration:none;">CCSE</a></center>
</div>
<center><u>Search result</u></center>
<br><br>
<div style="width:140px; height:60px; background-color:pink; margin-left:140px; position:relative;  top:-.22em; ">
<br>
<center><a href="search_networking.php" STYLE="font-size:120%; text-decoration:none; color:solid black;">Networking</a></center>
</div>
<div style="width:140px; height:60px; background-color:green; margin-left:430px;  position:relative;  top: -3em; ">
<br>
<center><a href="search_ccsa.php" STYLE="font-size:130%; text-decoration:none; color:white;">CCSA</a></center>
</div>
<div style="width:140px; height:60px; background-color:YELLOW; margin-left:720px;  position:relative;  top: -5.7em; ">
<br>
<center><a href="search_ccse.php" STYLE="font-size:130%; text-decoration:none;">CCSE</a></center>
</div>
<div style="width:140px; height:60px; background-color:#ff0000; margin-left:140px; position:relative;  top: -4em; ">
<br>
<center><a href="filldate_search.php" STYLE="font-size:130%; text-decoration:none; color:white;">BY DATE</a></center>
</div>
<div style="width:140px; height:60px; background-color:#00ffff; margin-left:430px;  position:relative;  top: -6.7em; ">
<br>
<center><a href="search_name.php" STYLE="font-size:130%; text-decoration:none; color:black;">BY NAME</a></center>
</div>
<center><u>Added Multiple Choice Question</u></center>
<br><br>
<div style="width:140px; height:60px; background-color:pink; margin-left:140px; position:relative;  top:-0.1em; ">
<br>
<center><a href="net_qlist.php" STYLE="font-size:120%; text-decoration:none; color:solid black;">Networking</a></center>
</div>
<div style="width:140px; height:60px; background-color:green; margin-left:430px;  position:relative;  top: -3em; ">
<br>
<center><a href="ccsa_qlist.php" STYLE="font-size:130%; text-decoration:none; color:white;">CCSA</a></center>
</div>
<div style="width:140px; height:60px; background-color:YELLOW; margin-left:720px;  position:relative;  top: -5.7em; ">
<br>
<center><a href="ccse_qlist.php" STYLE="font-size:130%; text-decoration:none;">CCSE</a></center>
</div>
<center><u>Added True/False Question</u></center>
<br><br>
<div style="width:140px; height:60px; background-color:pink; margin-left:140px; position:relative;  top:-0.1em; ">
<br>
<center><a href="net2_qlist.php" STYLE="font-size:120%; text-decoration:none; color:solid black;">Networking</a></center>
</div>
<div style="width:140px; height:60px; background-color:green; margin-left:430px;  position:relative;  top: -3em; ">
<br>
<center><a href="ccsa2_qlist.php" STYLE="font-size:130%; text-decoration:none; color:white;">CCSA</a></center>
</div>
<div style="width:140px; height:60px; background-color:YELLOW; margin-left:720px;  position:relative;  top: -5.7em; ">
<br>
<center><a href="ccse2_qlist.php" STYLE="font-size:130%; text-decoration:none;">CCSE</a></center>
</div>
<a href="logout.php" style="font-size:80%; margin-left:50px;">Logout</a>
<br><br>
</div><div class="clear">
</div>
<?php
 }elseif(!loggedin()) { 
 ?><div style="height:500px;">
 <?php
 
 echo ' <center><br><br><br><br><br><br><br>&nbsp&nbsp&nbsp&nbspPlease login first ..<br><br></center>' ;
}
 ?>
 </div>
<?php include("footer.php"); ?>