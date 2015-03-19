<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>
 <?php
 if(loggedin())
 {?>
<div id="maindiv" style="height: 540px;" >
<br><br><br><br>
<center><u>Select Test</u></center>
<br><br>
<div style="width:150px; height:80px; background-color:pink; margin-left:140px; position:relative;  top:.70em; ">
<br>
<center><a href="networking.php" STYLE="font-size:120%; text-decoration:none; color:solid black;">Networking</a></center>
</div>
<div style="width:150px; height:80px; background-color:green; margin-left:430px;  position:relative;  top: -3em; ">
<br>
<center><a href="ccna.php" STYLE="font-size:130%; text-decoration:none; color:white;">CCSA</a></center>
</div>
<div style="width:150px; height:80px; background-color:YELLOW; margin-left:720px;  position:relative;  top: -6.7em; ">
<br>
<center><a href="ccse.php" STYLE="font-size:130%; text-decoration:none;">CCSE</a></center>
</div>
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