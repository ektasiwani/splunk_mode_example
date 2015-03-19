<?php include("conect.php"); ?>
<?php include("header.php"); ?>

<?php

if(!loggedin()){
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_again'])){
 $name1= $_POST['name'];
 $name= mysqli_escape_string($con,trim($name1));
 $email1= $_POST['email'];
 $email= mysqli_escape_string($con,trim($email1));
 $password1= $_POST['password'];
  $password= mysqli_escape_string($con,trim($password1));
 $password_again=$_POST['password_again'];
 if(!empty($name) && !empty($email) && !empty($password) && !empty($password_again)){
 if($password != $password_again){?>
  <p style="color:red; margin-left:176px; font-size:40;">Passwords doesnot match</p>
  <?php
}
 else{
 $query="SELECT * FROM users WHERE name='".$name."' AND email='".$email."'";
 $query_run= mysqli_query($con,$query) or die(mysql_error());
 if(mysqli_num_rows($query_run)==1){?>
  <p style="color:red; margin-left:176px; font-size:40;">Username <?php echo $name ?> already exist..</p>
<?php
 }

else{ 
 
 $query="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
 $query_run=mysqli_query($con,$query);?>
<p style="color:black; margin-left:176px; font-size:40;">Registered<p>
<?php 
}}
 }else{?>
 <p style="color:red; margin-left:176px; font-size:40;">Error in fill</p>
<?php
}
}
}
?>
 <div id="maindiv" style="height:540px;">
 <br><br><br>
 <center><p style="font-size: 100%; margin-left:50px;"><u><b><i>REGISTER</i></b></u></P></center>
<center><form action="register.php" method="POST" autocomplete="off" style="font-size: 90%; margin-left:50px;"><br>
Username : <input type="text" name="name" maxlength="30" placeholder="Username"><br><br><br>
Email id : <input type="email" name="email" maxlength="40" placeholder="Email id"><br><br><br>
Password : <input type="password" maxlength="10" name="password" placeholder="Password" ><br><br><br>
Password again : <input type="password" maxlength="10" name="password_again" placeholder="Confirm password"><br><br><br>
<input type="submit" name="submit" style="color:white; background-color:green; width:60px; height:35px;" value="submit"><br><br>
</form></center>
</div><div class="clear">
</div>
<?php include("footer.php"); ?>