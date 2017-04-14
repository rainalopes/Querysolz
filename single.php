<?php
   include('session.php');
?>
<!doctype>
<html>
   
   <head>
      <title>Welcome </title>
<style>
.button {
    background-color: crimson; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
border-radius: 2px;
}
.links {
    background-color: green; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
border-radius: 2px;
}
a:hover
{
background-color:orange;
}
.order {border-radius: 12px;}

.elements
{
font-family:Cooper Black; 
font-size:150%;
text-align:center;
font-face:bold;
}

.button2 {background-color: #008CBA;} /* Blue */

.content{
	width:1000px;
	margin:0 auto;
}
#user_timeline{
	background:#AFEEEE;
	width:250px;
	float:left;
	height:800px;
	border-right:1px solid black;
}

#user_details{
	padding:10px;
	margin-bottom:5px;
}
#user_details img{border:2px solid black; border-radius:20px; text-align:center;}
#user_details p{
	margin-bottom:10px;
	padding:10px;
}
#user_details a{color:brown;font-size:20px;text-decoration:none;}
#user_details a:hover{color:black;font-size:20px;text-decoration:underline;font-weight:bolder;}

#content_timeline{
	float:right;
	width:700px;
	padding:10px;
}
#f input{
	padding:8px;
border:1px solid black;
border-radius:5px;
font-weight:bolder;
}
#f textarea{
	padding:8px;
border:1px solid black;
border-radius:5px;
font-weight:bolder;
}
#f select{
	padding:8px;
border:1px solid black;
border-radius:5px;
font-weight:bolder;
}
#menu{
	line-height:35px;
	padding:0;	
}
#menu li{
	display:inline;
	list-style:none;
	font-size:125%;
}
</style>

   </head>
   
   <body style="background-color:lightblue;">
      <!--container starts-->
   <div id="container">
   <h3 style="text-align:left;color:PURPLE;font-size:200%;"><u><b>QUERYSOLZ</b></u></h3>
   <ul id="menu">
   <li><a href="welcome.php">HOME</a>&nbsp&nbsp&nbsp</li>
   <strong style="font-size:125%;">Topics:</strong>
   <?php
   $get_topics="select * from courses";
   $run_topics=mysqli_query($conn,$get_topics);
   while($row=mysqli_fetch_array($run_topics)){
	   $topic_id=$row['id'];
	   $topic_name=$row['name'];
	   echo "<li><a href='welcome.php?topic=$topic_id'>$topic_name</a></li> &nbsp&nbsp&nbsp";
   }?>
   </ul>
   </div>
   <!--container ends-->

<!--user timeline login details -->
<div class="content">
<div id="user_timeline">
<div id="user_details">
<?php

$sql = "SELECT user_image FROM login WHERE email_id= '$login_session' ";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
{
extract($row);
echo "<p><img src=\"$user_image\"  width=200 height=200 /></p>";
}
?> 
<?php
$user=$_SESSION['login_user'];
$get_user="select * from student where email_id= '$login_session' ";
$run_user= mysqli_query($conn,$get_user);
$row=mysqli_fetch_array($run_user);
$user_fname=$row['fname'];
$user_lname=$row['lname'];
$user_college=$row['college'];
$user_dob=$row['dob'];
echo "<div style='background:lightgray; border:2px solid black;border-radius:20px;width:200px;margin:0 auto;padding:5px'><p><strong>Name:</strong> $user_fname &nbsp $user_lname </p>
<p><strong>College:</strong> $user_college </p>
<p><strong>Date Of Birth:</strong> $user_dob </p>
<p><a href='my_messages.php'>Messages</a></p>
<p><a href='edit_profile.php'>Edit Profile</a></p>
<p><a href='logout.php'>Logout</a></p></div>";
?>
</div>
</div>
<div id="content_timeline">
<div id="posts">
<?php 
if(isset($_GET['post_id'])){
	$get_id=$_GET['post_id'];
	$get_posts="select* from posts where post_id='$get_id'";
$run_posts=mysqli_query($conn,$get_posts);

$row_posts=mysqli_fetch_array($run_posts);

	$post_id=$row_posts['post_id'];
	$user_id=$row_posts['email_id'];
	$post_title=$row_posts['post_title'];
	$content=$row_posts['post_content'];
	$snapshot=$row_posts['snapshot'];
	$post_date=$row_posts['post_date'];
	$course_id=$row_posts['topic_id'];
	$subcourse_id=$row_posts['subcourse_id'];
	
	$get_topicname="select name from courses where id='$course_id'";
	$get_subtopicname="select name from sub_courses where subcourse_id='$subcourse_id'";
	
	$run_topicname=mysqli_query($conn,$get_topicname);
	$run_subtopicname=mysqli_query($conn,$get_subtopicname);
	
	$row_topic=mysqli_fetch_array($run_topicname);
	$row_subtopic=mysqli_fetch_array($run_subtopicname);
	
	$topicname=$row_topic['name'];
	$subtopicname=$row_subtopic['name'];
	
	$designation="select * from login where email_id='$user_id' ";
	$run_designation=mysqli_query($conn,$designation);
	$row_desig=mysqli_fetch_array($run_designation);
	if($row_desig['designation']=="student"){
		$username="select * from student where email_id='$user_id'";
$run_username=mysqli_query($conn,$username);
$row_username=mysqli_fetch_array($run_username);
$fname=$row_username['fname'];
$lname=$row_username['lname'];
$image="select * from login where email_id='$user_id'";
$run_image=mysqli_query($conn,$image);
$row_image=mysqli_fetch_array($run_image);
$user_image=$row_image['user_image'];
echo "<div id='posts'>
<p><img src='$user_image' width='50' height='50'></p>
<h3><a href='user_profile.php?user_id=$user_id'>$fname&nbsp$lname</a></h3>
<h3>$post_title</h3>
<p>$post_date</p>
<p>$content</p>
<img src='uploads/$snapshot' style='height:100px;width:100px'/>
<p><strong>Topic:$topicname</strong></p>
<p><strong>Sub-Topic:$subtopicname</strong></p>
</div><br/>";
	}
	else{
		$username="select * from mentor where email_id='$user_id'";
$run_username=mysqli_query($conn,$username);
$row_username=mysqli_fetch_array($run_username);
$fname=$row_username['fname'];
$lname=$row_username['lname'];
$image="select * from login where email_id='$user_id'";
$run_image=mysqli_query($conn,$image);
$row_image=mysqli_fetch_array($run_image);
$user_image=$row_image['user_image'];
echo "<div id='posts'>
<p><img src='$user_image' width='50' height='50'></p>
<h3><a href='user_profile.php?user_id=$user_id'>$fname&nbsp$lname</a></h3>
<h3>$post_title</h3>
<p>$post_date</p>
<p>$content</p>
<img src='uploads/$snapshot' style='height:100px;width:100px'/>
<p><strong>Topic:$topicname</strong></p>
<p><strong>Sub-Topic:$subtopicname</strong></p>
</div><br/>";
	}
include("comments.php");
echo "<form action='' method='post'>
<textarea cols='50' rows='5' name='comment' placeholder='Write your reply...' required></textarea><br/>
<input type='submit' name='reply' value='Reply'/>
</form>"; 

if(isset($_POST['reply'])){
	$comment=addslashes($_POST['comment']);
	$insert="insert into comments(post_id,email_id,comment,comment_author,date)values('$post_id','$login_session','$comment','$user_fname $user_lname',NOW())";
	$run=mysqli_query($conn,$insert);
	echo "<h2>Your Reply was successfully added!</h2>";
echo "<script>window.open('single.php?post_id=$get_id','_self')</script>";	
}

} 
?>


</div>
 </div>
</div>


   </body>
   
</html>

   
