<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>
<?php
if( isset($_POST['password'])){
$password1= $_POST['password'];
$password= mysqli_real_escape_string($con,trim($password1));
$password_hash= md5($password);

//check if empty

if(!empty($password)){
//check if user exist
if($password=='q1w2e3')
{
$user_id= 'q1w2e3';
$_SESSION['user_id']=$user_id;
header('Location: admin.php ') ;}
else{?>
 <div style="color:red; margin-left:176px; width:200px;font-size:40;">Wrong password</div><br>
<?php
}
}
}
?>

<div id="maindiv" style="height:540px;">
<br><br><center><p style="font-size:100%; margin-left:100px;"><u><b><i>Admin Log in</i></b></u></p></center>
<center><form action="adminlog.php" method="POST" autocomplete="off" style="font-size:100%; margin-left:100px;"><br><br>

Password :  <input type="password" name ="password" placeholder="Password"><br><br><br>
<input type="submit" name="submit" style="color:white; background-color:green; width:60px; height:35px;" value="Log in">
</form></center>

</div><div class="clear">
</div>
<?php include("footer.php"); ?>