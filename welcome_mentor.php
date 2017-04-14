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
	height:auto;
	border:1px solid black;
    
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
	list-style-type: none;
    margin: 0;
    overflow: hidden;
    background-color: #333;
	color:white;
    position: fixed;
    top: 0;
    width: 100%;
	height:50px;
}
#menu li{
	display:inline;
	list-style:none;
	font-size:125%;
	float: left;
}
#menu li a {
	display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
#menu li a:hover:not(.active) {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}
#post{
	border:2px solid black;
	background-color:#F9DDA2;
	padding:15px;
}
</style>
<SCRIPT language=JavaScript>
function reload(form){
var val=form.topic.options[form.topic.options.selectedIndex].value;

self.location='welcome_mentor.php?topic=' + val ;
}
</script>
   </head>
   
   <body style="background-color:lightblue;">
   <!--container starts-->
   <div id="container">
   <ul id="menu">
   <li><a class="active" href="welcome_mentor.php">HOME</a>&nbsp&nbsp&nbsp</li>
   <li><a href='MyCourses.php'>My Courses</a></li>
<li><a href='my_messages.php'>Messages</a></li>
<li><a href='edit_profile.php'>Edit Profile</a></li>
<li><a href='logout.php'>Logout</a></li>
<li style="padding: 14px 16px;float:right;">QUERYSOLZ.</li>
   </ul>
   </div>
   <!--container ends-->
   <br><br>
<h5 style="font-size:150%;">Welcome <?php echo $login_session; ?></h5> 

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
$get_user="select * from mentor where email_id= '$login_session' ";
$run_user= mysqli_query($conn,$get_user);
$row=mysqli_fetch_array($run_user);
$user_fname=$row['fname'];
$user_lname=$row['lname'];
$user_qualification=$row['qualification'];
$user_foe=$row['field of exp'];
echo "<div style='background:lightgray; border:2px solid black;border-radius:20px;width:200px;margin:0 auto;padding:5px'><p><strong>Name:</strong> $user_fname &nbsp $user_lname </p>
<p><strong>Qualification:</strong> $user_qualification </p>
<p><strong>Field Of Experience:</strong> $user_foe </p></div>"
?>
</div>
</div>
<div id="content_timeline">
<?php
@$course=mysqli_real_escape_string($conn,$_GET['topic']); //This line is added to take care if your global variable is off
if(isset($course)){
$get_subtopic = "select * from sub_courses where course_id= '$course' ";
}
else{$get_subtopic="SELECT * from sub_courses "; } 
?>
<form action="welcome_mentor.php?id=<?php echo $user;?><?php echo $_SERVER['PHP_SELF']; ?>" method="post"id="f" enctype="multipart/form-data">
<h3>So what's Topic of discussion today??? Post it and start your discussion.</h3>
<?php 
echo "<select name='topic' id='topic' onchange=\"reload(this.form)\" required>
   <option value=''>Select Topic</option>";
   $get_topics="select * from courses";
   $run_topics = mysqli_query($conn,$get_topics);
   while($row = mysqli_fetch_array($run_topics))
   {
	   $topic_id=$row['id'];
	   $topic_title=$row['name'];
	   if($topic_id==@$course){echo "<option selected value='$topic_id'>$topic_title</option>";}
else{echo "<option value='$topic_id'>$topic_title</option>";}
}   
echo "</select>";
?>
<?php
echo"<select name='SubTopic'  id='SubTopic' required>
<option value=''> Sub Topic </option>";
$run_subtopic = mysqli_query($conn,$get_subtopic);
while($row_sub = mysqli_fetch_array($run_subtopic)){
	$subtopic_id = $row_sub['subcourse_id'];
	   $subtopic_title = $row_sub['name'];
	   echo "<option value='$subtopic_id'>$subtopic_title</option>";
}
echo "</select>"; 

?>
<br><br>
<input type="text" name="title" placeholder="Write a title" required size="75"/><br><br>
<textarea cols="65" rows="4" name="content" placeholder="Write description..." required></textarea>
<br><br>
 <input type="file" name="snapshot" accept="image/*"/>
<input type="submit" name="submit" value="Post"/>
</form>
<?php 
if(isset($_POST['submit'])){
	$title=htmlspecialchars(addslashes($_POST['title']));
	$content=htmlspecialchars(addslashes($_POST['content']));

	$topic=$_POST['topic'];
	$subtopic = $_POST['SubTopic'];
	$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['snapshot']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES['snapshot']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES['snapshot']['name']). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $post_image=basename( $_FILES['snapshot']['name']); 
	
	$insert="insert into posts(email_id,topic_id,subcourse_id,post_title,post_content,snapshot,post_date) values('$login_session','$topic','$subtopic','$title','$content','$post_image',NOW())";
$run=mysqli_query($conn,$insert);
if($run){
	echo"<h3>Posted to timeline!!!</h3>";
}
	}?>



<div id="posts">
<h3>Most Recent Discussions!!!</h3>

<?php 
$per_page=5;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
else{
	$page=1;
}
$start_from=($page-1)*$per_page;
$get_posts="select* from posts ORDER by 1 DESC LIMIT $start_from,$per_page";
$run_posts=mysqli_query($conn,$get_posts);

while($row_posts=mysqli_fetch_array($run_posts))
{
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
	
	$designation="select * from login where email_id='$user_id'";
	$run_designation=mysqli_query($conn,$designation);
	$row_desig=mysqli_fetch_array($run_designation);
	if($row_desig['designation']=="student")
	{
		$username="select * from student where email_id='$user_id'";
$run_username=mysqli_query($conn,$username);
$row_username=mysqli_fetch_array($run_username);
$fname=$row_username['fname'];
$lname=$row_username['lname'];
$image="select * from login where email_id='$user_id'";
$run_image=mysqli_query($conn,$image);
$row_image=mysqli_fetch_array($run_image);
$user_image=$row_image['user_image'];
echo "<div id='post'>
<p><img src='$user_image' width='50' height='50'></p>
<h3><a href='user_profile.php?user_id=$user_id'>$fname&nbsp$lname</a></h3>
<h3>$post_title)</h3>
<p>$post_date</p>
<p>$content</p>
<img src='uploads/$snapshot' style='height:100px;width:100px'/>
<p><strong>Topic:$topicname</strong></p>
<p><strong>Sub-Topic:$subtopicname</strong></p>
<a href='single_mentor.php?post_id=$post_id' style='float:right;'><button>See Replies or reply to this post</button></a><br><br>
</div>"; 
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
echo "<div id='post'>
<p><img src='$user_image' width='50' height='50'></p>
<h3>Mentor:<a href='user_profile.php?user_id=$user_id'>$fname&nbsp$lname</a></h3>
<h3>$post_title</h3>
<p>$post_date</p>
<p>$content</p>
<img src='uploads/$snapshot' style='height:100px;width:100px'/>
<p><strong>Topic:$topicname</strong></p>
<p><strong>Sub-Topic:$subtopicname</strong></p>
<a href='single_mentor.php?post_id=$post_id' style='float:right;'><button>See Replies or reply to this post</button></a><br>
</div>"; 
	}
		
}
include("pagination_mentor.php");
?>
</div>
 </div>
</div>


   </body>
   
</html>

   
