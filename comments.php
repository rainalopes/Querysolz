<style>
#comments{
	background:#5F9EA0;
	padding:5px;
	width:600px;
	border:2px solid white;
}
#comments span{
	color:#FFF8DC;
	padding:5px;
	width:600px;
}
#comments h3{
	color:#FFD700;
}
#comments p{
	line-height:20px;
	font-size:16px;
	padding:5px;
}

</style>


<?php
$get_id=$_GET['post_id'];
	$get_comments="select* from comments where post_id='$get_id'";
$run_comments=mysqli_query($conn,$get_comments);
while($row=mysqli_fetch_array($run_comments)){
	$com=$row['comment'];
	$com_name=$row['comment_author'];
	$date=$row['date'];
	
	echo"<div id='comments'>
	<h3>$com_name</h3><span><i>Answered</i> on $date </span>
<p>$com</p>	</div>";
}

?>