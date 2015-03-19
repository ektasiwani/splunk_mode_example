<?php include("conect.php");?>
<?php
if(isset($_GET['search_text'])){
 $search_text = $_GET['search_text'];

}
if(isset($_GET['search_type'])){
 $search_text = $_GET['search_type'];

}
//for searching by name

if(!empty($search_text)){
   $serch_text1= mysqli_real_escape_string($con,$search_text);
   
    $query = "SELECT * FROM quiz_takers WHERE username LIKE '$serch_text1%'";
	$query_run = mysqli_query($con,$query);
	if (!$query_run) {
        echo 'MySQL Error: ' . mysqli_error($con);
        exit;
    }
	
	while ($query_row = mysqli_fetch_assoc($query_run)){
	
	 echo $name = $query_row['username'].'<br>';
	}
	
	
}
?>