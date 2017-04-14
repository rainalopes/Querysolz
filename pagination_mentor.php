<style>
#pagination{
	margin-top:20px;
}
#pagination a{
	color:blue;
	text-decoration:none;
	font-size:18px;
	margin:5px;
}
#pagination a:hover{
	color:brown;
	text-decoration:underline;
	font-weight:bolder;
	
}
</style>



<?php 
$query="select* from posts";
$total_posts=mysqli_num_rows($result);
$total_pages=ceil($total_posts/$per_page);
echo"
<center>
<div id='pagination'>
<a href='welcome_mentor.php?page=1'>First page</a>
";
for($i=1;$i<=$total_pages;$i++){
	echo "<a href='welcome_mentor.php?$page=$i'>$i</a>";
}

echo "<a href='welcome_mentor.php?page=$total_pages'>Last Page</a></center></div>";
?>