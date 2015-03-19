<?php include("header.php"); ?>
<head>
<script type="text/javascript">
function findmatch() {
if (window.XMLHttpRequest){
 xmlhttp = new XMLHttpRequest();
 }else{
 xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
 }
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
 document.getElementById('results').innerHTML = xmlhttp.responseText ;
 }
 }
 xmlhttp.open('GET','search.php?search_text=' + document.search.search_text.value, true);
 xmlhttp.send();

}

</script>
</head>
<body>
<div id="maindiv" style= "height:540px;">
<br><br><center><p>Searching by name</p></center>
<br><br>
<center><form id="search" name="search" action="findsearch.php" > 
 Enter name : <br><br><br>
 <input type="text" name="search_text" onkeyup="findmatch();">
</form></center>
<br><br><br><br>
<center><div id="results"></div></center>
</div><div class="clear">
</div>
</body>
<?php include("footer.php"); ?>