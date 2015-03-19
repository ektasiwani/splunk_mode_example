<?php require_once("conect.php"); ?>
<?php include("header.php"); ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
$username1= $_POST['username'];
$username= mysqli_real_escape_string($con,trim($username1));
$password1= $_POST['password'];
$password= mysqli_real_escape_string($con,trim($password1));
$password_hash= md5($password);

//check if empty

if(!empty($username) && !empty($password))

{ global $con;
$sql= (" SELECT id FROM users WHERE name='$username'  AND password='$password'") or die(mysqli_error());

$run= mysqli_query($con,$sql);
$num=mysqli_num_rows($run);
//check if user exist
if($num==0){
header('Location: invalide.php ') ;
}elseif($num==1)
{
$user_id= mysqli_fetch_assoc($run);
$_SESSION['user_id']=$user_id;
echo 'done';
header('Location: index.php ') ;}
}else{
header('Location: empty.php ') ;
}
}
?>
<div id="maindiv" style="height:540px;">
<br><center><p style="font-size:100%; margin-left:100px;"><u><b><i>Log in</i></b></u></p></center>
<center><form action="logform.php" method="POST" autocomplete="off" style="font-size:100%; margin-left:100px;"><br>
Username :  <input type="text" name="username" placeholder="Username" ><br><br>
Password :  <input type="password" name ="password" placeholder="Password"><br><br>
<input type="submit" name="submit" style="color:white; background-color:green; width:60px; height:35px;" value="Log in">
</form></center>
<br><br><br><br>
<center><p style="font-size:100%; margin-left:100px;">If you are new user register here..</p></center>
<center><a  style="font-size:100%; margin-left:100px;" href="register.php">REGISTER</a></center>
</div><div class="clear">
</div>
<?php include("footer.php"); ?>