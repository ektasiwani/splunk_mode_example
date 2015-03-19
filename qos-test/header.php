<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <title>
	
        QOS test your skills
    </title>
	<link rel="icon" href="header_files/qos.ico" />
	
  <?php include ("core.php");?> 
  <link rel="stylesheet" type="text/css" href="header_files/main.css" />
   <link rel="stylesheet" type="text/css" href="header_files/rps.css" />
  <script language="javascript" src="header_files/menu.js"></script>

<?php  
if(!loggedin()){
echo '<a class="log" href="logform.php">&nbsp;Log in</a>';}
else{
echo '<a class="log" href="logout.php">&nbsp;Log out</a>';
}?>
<a class="reg" href="register.php">Register</a>
<a class="reg" href="adminlog.php">Admin</a>
<br><br>
  <h1 style="background-color:#585f69; width:1366px; height:60px; margin-left:0;">
<img  src="header_files/qos.png" alt="Logo" style="height: 80px; width:160px; margin-top: -34px; margin-left:100px" />

<nav id="top-menu">
<ul><table class="navbar" cellspacing="2px";>
 <li><a class="specialeffects" href="index.php">Home&nbsp;</a></li>
  <li><a class="specialeffects" href="topper.php">Toppers&nbsp;</a></li>
 <li><a class="specialeffects" href="check.php">Score&nbsp;</a></li>
 <li><td onmouseover="expand(this);" onmouseout="collapse(this);">
        <a STYLE="COLOR:white; font-size:20px; font-family:Monda;  position:relative; top: -0.2em; ">Select Test</a>
        <div class="menuNormal">
          <table class="menu" width="109" height="170">
            <tr><td class="menuNormal" >
             <center> <a style="font-size:18px; font-family:Monda; color:white; text-decoration:none; " href="ccna.php" >CCSA</a></center>
            </td></tr>
            <tr><td class="menuNormal">
              <center><a style="font-size:18px; font-family:Monda; color:white; text-decoration:none;" href="ccse.php">CCSE</a></center>
            </td></tr>
            <tr><td class="menuNormal" >
              <center><a style="font-size:18px; font-family:Monda; color:white; text-decoration:none;" href="networking.php">Networking</a></center>
            </td></tr>
			 </table>
        </div>
      </td>
   </li>

</ul></table>
</nav>
</h1>
<header>
<style>	
body {
background-color:#FFFFFF;  
}
</style>

</header>