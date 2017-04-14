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
   <li><a href='My_Courses.php'>My Courses</a></li>
<li><a href='my_messages.php'>Messages</a></li>
<li><a href='edit_profile.php'>Edit Profile</a></li>
<li><a href='logout.php'>Logout</a></li>
<li style="padding: 14px 16px;float:right;">QUERYSOLZ.</li>
   </ul>
   </div>
   <!--container ends-->
   <br><br>
 

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

 </div>



   </body>
   
</html>

   
